<?php
/**
 * License
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

/**
 * Klasa do generowania i obsługi pager'a
 * Klasa zapamietuje aktualną stronę dodatkowo w sesji. Dzięki temu można skakać po różnych linkach
 * a gdy się wróci na stronę z pager'em, to będziemy na ostatnio wybranej stronie.
 *
 * @package MCM
 * @subpackage independent
 * @version 2.5 for PHP5
 * @author Robert (nospor) Nodzewski (email: nospor at interia dot pl)
 * @copyright 2005 - 2007 Robert Nodzewski
 * @license http://opensource.org/licenses/lgpl-license.php GNU Lesser General Public License
 **/
class Pager {
	/** Stałe klasy */
	const GOTO_FIRST = 'gtf';
	const GOTO_PREV_X = 'gtpx';
	const GOTO_PREV = 'gtp';
	const GOTO_NEXT = 'gtn';
	const GOTO_NEXT_X = 'gtnx';
	const GOTO_LAST = 'gtl';
	const PAGES = 'pages';
	const PAGE = 'page';
	const LINK = 'link';
	const LINK_PAGE = 'lp';
	const LINK_SEP = 'ls';
	const PARAM_PAGE_NUMBER = 'ppn';
	const PAGES_PER_NAV = 'ppern';
	const TOTAL_RECORDS = 'tr';
	
	/** Podstawowy adres do kolejnych stron.*/
	protected $linkPage = '';
	
	/** Podstawowy adres do kolejnych stron.*/
	protected $userWholeLink = false;
	
	/** Czym połączyć parametr strony z adresem (? lub &) */
	protected $linkSep = '?';
	
	/** Liczba rekordów */
	protected $totalRecords = 0;
	
	/** Ilość rekordów na stronie */
	public $RecordsPerPage = 10;
	
	/** Numer aktualnej strony */
	protected $actualPage = 0;
	
	/** Liczba stron na pasku nawigatora */
	public $pagesPerNav = 10;
	
	/** Która to jest x(_pagesOnNav) stron */
	protected $actualNavPages = 1;
	
	/** Ilość x stron */
	protected $totalNavPages = 1;
	
	/** Ilość wszystkich stron */
	protected $totalPages = 0;
	
	/** Index rekordu początkowego (od 0) */
	protected $indexRecordStart = null;
	
	/** Index rekordu końcowego (od 0) */
	protected $indexRecordEnd = null;
	
	/** Index strony początkowej */
	protected $indexPageStart;
	
	/** Index strony końcowej */
	protected $indexPageEnd;
	
	/** id pagera */
	protected $id;
	
	/** Nazwa parametru, w której będzie numer aktualnej strony */
	protected $paramPageNumber;
	
	/** Nazwa parametru ogólnego w url z numerem strony */
	public $GeneralParamPageNumber = 'page';
	
	private $useGeneralParam;
	/** Czy zapamiętywać dane w sesji */
	protected $useSession = true;
	
	/** Tablica reprezentująca pager */
	protected $array = array ();
	
	/** Komunikaty błędów */
	protected $errorMsg = array ('call_get' => 'Method %s() You must call after Make()', 'call_set' => 'Method %s() You must call before Make()', 'wrong_parameter' => 'Wrong parameter "%s" in method "%s()"' );
	
	/**
	 * Konstruktor klasy
	 *  
	 * @param string id - unikalne id pagera.
	 * @param string pageLink - adres, jaki będzie generowny do linków w pagerze
	 * Jeśli pageLink zawiera ciąg #PAGE#, oznaczać to będzie, iż link nie będzie modyfikowany przez klase, tylko 
	 * będzie wyglądał jak zapodał użytkownik. Jedyne co zostanie podmienione to #PAGE# na numer strony.
	 * Jeśli pageLink będzie nullem, klasa wstawi parametr strony do linku uwzględniając przy tym wszystkie parametry jakie były w linku.
	 * @param bool userGeneralParam - czy jako parametru strony używać parametru dla danego pagera, czy też ogólnego 
	 * parametru określonego w $GeneralParamPageNumber
	 */
	public function __construct($id, $pageLink = '', $useGeneralParam = false) {
		$this->id = $id;
		$this->useGeneralParam = $useGeneralParam;
		$this->paramPageNumber = 'pp' . $id;
		if (is_null ( $pageLink ))
			$this->makeLink ();
		else
			$this->linkPage = $pageLink;
		
		if (strpos ( $this->linkPage, '#PAGE#' ) !== false)
			$this->userWholeLink = true;
		if (! $this->userWholeLink && $this->linkPage && strpos ( $this->linkPage, '?' ) !== false)
			$this->linkSep = '&amp;';
	}
	
	/**
	 * Tworzy link pagera uwzględniając (zachowując) przy tym wszystkie aktualne parametry w linku.
	 * Funkcja ustawia właściwość linkPage na taki link, jaki powinien już być. Należy o tym pamiętać, jeśli ktoś
	 * będzie miał ochotę modyfikować tę funkcję.
	 */
	protected function makeLink() {
		//TODO: pomyslec cos z niceurl
		//pobranie nazwy parametru z $_GET
		$paramPageNumber = $this->getUrlParamPageNumber ();
		//wyrzucenie go z REQUEST_URI jeśli był
		$this->linkPage = $paramPageNumber ? preg_replace ( '/&?' . $paramPageNumber . '=\d*/', '', $_SERVER ['REQUEST_URI'] ) : $_SERVER ['REQUEST_URI'];
	}
	
	/**
	 * Ustawia używanie sesji
	 *  
	 * @param boolean $useSession
	 * @return true
	 */
	public function SetUseSession($useSession) {
		$this->useSession = $useSession;
		return true;
	}
	
	/** 
	 * Ustawiamy liczbę rekordów na stronie
	 * 
	 * @param int $rpp liczba rekordów na stronie
	 * @return true 
	 */
	public function SetRecordsPerPage($rpp) {
		if (! is_null ( $this->indexRecordStart ))
			throw new Exception ( sprintf ( $this->errorMsg ['call_set'], 'SetRecordsPerPage' ) );
		$this->RecordsPerPage = ( int ) $rpp;
		return true;
	}
	/** 
	 * Ustawiamy liczbę stron w nawigatorze
	 * 
	 * @param int $pon liczba stron w nawigatorze
	 * @return true 
	 */
	public function SetPagesPerNav($pon) {
		if (! is_null ( $this->indexRecordStart ))
			throw new Exception ( sprintf ( $this->errorMsg ['call_set'], 'SetPagesPerNav' ) );
		$this->pagesPerNav = ( int ) $pon;
		return true;
	}
	
	/** 
	 * Ustawiamy liczbę wszystkich rekordów
	 * 
	 * @param int $count liczba wszystkich rekordów
	 * @return true 
	 */
	public function SetTotalRecords($count) {
		if (! is_null ( $this->indexRecordStart ))
			throw new Exception ( sprintf ( $this->errorMsg ['call_set'], 'SetTotalRecords' ) );
		$this->totalRecords = ( int ) $count;
		return true;
	}
	
	/** 
	 * Zwraca index rekordu początkowego (od 0)
	 * 
	 * @return int 	 
	 */
	public function GetIndexRecordStart() {
		if (is_null ( $this->indexRecordStart ))
			throw new Exception ( sprintf ( $this->errorMsg ['call_get'], 'GetIndexRecordStart' ) );
		return $this->indexRecordStart;
	}
	
	/** 
	 * Zwraca index rekordu końcowego (od 0)
	 * 
	 * @return int 	 
	 */
	public function GetIndexRecordEnd() {
		if (is_null ( $this->indexRecordStart ))
			throw new Exception ( sprintf ( $this->errorMsg ['call_get'], 'GetIndexRecordEnd' ) );
		return $this->indexRecordEnd;
	}
	
	/** 
	 * Zwraca tablicę pager'a
	 * 
	 * @return array
	 */
	public function GetArray() {
		if (is_null ( $this->indexRecordStart ))
			throw new Exception ( sprintf ( $this->errorMsg ['call_get'], 'GetArray' ) );
		return $this->array;
	}
	
	/** 
	 * Ustawia numer aktulnej strony.
	 * Zaleca się nie używać tej metody, chyba że naprawdę istnieje potrzeba
	 * 
	 * @param int $page numer aktualnej strony
	 * @return true
	 */
	public function SetActualPage($page) {
		if (! is_null ( $this->indexRecordStart ))
			throw new Exception ( sprintf ( $this->errorMsg ['call_set'], 'SetActualPage' ) );
		$this->actualPage = ( int ) $page;
		return true;
	}
	
	/** 
	 * Zwraca numer aktulnej stony
	 * 
	 * @return int
	 */
	public function GetActualPage() {
		if (is_null ( $this->indexRecordStart ))
			throw new Exception ( sprintf ( $this->errorMsg ['call_get'], 'GetActualPage' ) );
		return $this->actualPage;
	}
	
	/** 
	 * Zwraca nazwę parametru wygenerowanego dla pagera. 
	 * 
	 * @return string
	 */
	public function GetParamPageNumber() {
		if (is_null ( $this->indexRecordStart ))
			throw new Exception ( sprintf ( $this->errorMsg ['call_get'], 'GetParamPageNumber' ) );
		return $this->useGeneralParam ? $this->GeneralParamPageNumber : $this->paramPageNumber;
	}
	
	protected function getUrlParamPageNumber() {
		return isset ( $_GET [$this->paramPageNumber] ) ? $this->paramPageNumber : (isset ( $_GET [$this->GeneralParamPageNumber] ) ? $this->GeneralParamPageNumber : null);
	}
	public function GetProbablyActualPage() {
		$paramPageNumber = $this->getUrlParamPageNumber ();
		$actPage = $paramPageNumber ? (( int ) $_GET [$paramPageNumber]) : 0;
		if ($actPage <= 0 && isset ( $_SESSION ) && $this->useSession)
			$actPage = isset ( $_SESSION [$this->paramPageNumber] ) ? (( int ) $_SESSION [$this->paramPageNumber]) : 0;
		if ($actPage <= 0)
			$actPage = 1;
		return $actPage;
	}
	/**
	 * Wylicza wszystkie niezbędne dane (aktualna strona, jakie indexy pobierać). Generuje tablicę pagera
	 * 
	 * @param boolean $smartRange czy używać zmiennych zasięgów
	 * @return array Tablica pagera
	 */
	public function Make($smartRange = false) {
		if ($this->actualPage <= 0)
			$this->actualPage = $this->GetProbablyActualPage ();
		
		$this->totalPages = ( int ) ceil ( $this->totalRecords / $this->RecordsPerPage );
		if ($this->actualPage > $this->totalPages)
			$this->actualPage = $this->totalPages;
		
		$this->totalNavPages = ( int ) ceil ( $this->totalPages / $this->pagesPerNav );
		$this->actualNavPages = ( int ) ceil ( $this->actualPage / $this->pagesPerNav );
		$this->indexRecordStart = ($this->actualPage - 1) * $this->RecordsPerPage;
		if ($this->indexRecordStart < 0)
			$this->indexRecordStart = 0;
		$this->indexRecordEnd = $this->indexRecordStart + $this->RecordsPerPage - 1;
		if ($this->indexRecordEnd + 1 > $this->totalRecords)
			$this->indexRecordEnd = $this->totalRecords - 1;
		if ($this->indexRecordEnd < 0)
			$this->indexRecordEnd = 0;
		
		if (! $smartRange) {
			$this->indexPageStart = ($this->actualNavPages - 1) * $this->pagesPerNav + 1;
			$this->indexPageEnd = $this->actualNavPages * $this->pagesPerNav;
			if ($this->totalPages < $this->indexPageEnd)
				$this->indexPageEnd = $this->totalPages;
		} else {
			$halfPagesOnNav = ( int ) ($this->pagesPerNav / 2);
			$this->indexPageStart = $this->actualPage - $halfPagesOnNav;
			$rest = 0;
			if ($this->indexPageStart < 1) {
				$rest = abs ( $this->indexPageStart ) + 1;
				$this->indexPageStart = 1;
			}
			$this->indexPageEnd = $this->actualPage + $halfPagesOnNav + $rest;
			if ($this->indexPageEnd > $this->totalPages) {
				$this->indexPageStart -= ($this->indexPageEnd - $this->totalPages);
				if ($this->indexPageStart < 1)
					$this->indexPageStart = 1;
				$this->indexPageEnd = $this->totalPages;
			}
		}
		
		if (isset ( $_SESSION ) && $this->useSession)
			$_SESSION [$this->paramPageNumber] = $this->actualPage;
		return $this->toArray ();
	}
	
	/**
	 * Generuje html odpowiadający pager'owi
	 * 
	 * @param mixed $externFunction zewnętrzna funkcja, która będzie generowała kod pager'a na podstawie podanej tablicy.
	 * Może to być string będący nazwą funkcji, bądź też tablica dwuelementowa, której pierwszym elementem jest nazwa klasy
	 * a drugim nazwa metody tej klasy. Do zewnętrznej funkcji zostanie zapodana tablica reprezentująca pager.
	 * @return string
	 */
	public function Render($externFunction = null) {
		if ($externFunction && ! (is_string ( $externFunction ) || (is_array ( $externFunction ) && count ( $externFunction ) == 2) && is_string ( $externFunction [0] ) && is_string ( $externFunction [1] )))
			throw new Exception ( sprintf ( $this->errorMsg ['wrong_parameter'], '$externFunction', 'Render' ) );
		if ($externFunction)
			return call_user_func ( $externFunction, $this->array );
		else
			return $this->toString ();
	}
	
	/**
	 * Tworzy tablicę reprezentującą pager. Tablica składa się z następujšcych indexów reprezentowanych przez stałe:
	 * - GOTO_FIRST - idź do pierwszej strony
	 * - GOTO_PREV_X - idź do x kolejnej strony
	 * - GOTO_PREV - idź do poprzedniej strony
	 * - GOTO_NEXT - idź do następnej strony
	 * - GOTO_NEXT_X - idź do x następnej strony
	 * - GOTO_LAST - idź do ostaniej strony
	 * wartością dla powyższych indexów jest tablica o indexach:
	 * 	- PAGE - numer strony
	 *  - LINK - pełny link do tej strony
	 * - PAGES - zawiera tablicę, której indexami są numery stron wyświetlanych w pagerze, 
	 * a wartością jest false (jest to strona aktualna - bez linku) lub string (pełny link do danej strony)
	 * - LINK_PAGE - link do strony (bez wstawionego numeru strony)
	 * - LINK_SEP - separator
	 * - PARAM_PAGE_NUMBER - nazwa parametru, w której będzie numer aktualnej strony
	 * - PAGES_PER_NAV - liczba stron na pasku nawigatora
	 * - TOTAL_RECORDS - Ogólna liczba rekordów 
	 * @return true
	 */
	protected function toArray() {
		$link = $this->linkPage;
		if (! $this->userWholeLink)
			$link .= $this->linkSep . ($this->useGeneralParam ? $this->GeneralParamPageNumber : $this->paramPageNumber) . '=';
		if ($this->indexPageStart > 1)
			$this->array [self::GOTO_FIRST] = array (self::PAGE => 1, self::LINK => $this->createLink ( $link, 1 ) );
		if ($this->actualPage - $this->pagesPerNav > 0)
			$this->array [self::GOTO_PREV_X] = array (self::PAGE => $this->actualPage - $this->pagesPerNav, self::LINK => $this->createLink ( $link, $this->actualPage - $this->pagesPerNav ) );
		if ($this->actualPage > 1)
			$this->array [self::GOTO_PREV] = array (self::PAGE => $this->actualPage - 1, self::LINK => $this->createLink ( $link, $this->actualPage - 1 ) );
			
		//strony
		$this->array [self::PAGES] = array ();
		for($i = $this->indexPageStart; $i <= $this->indexPageEnd; $i ++) {
			if ($i == $this->actualPage)
				$this->array [self::PAGES] [$i] = false;
			else
				$this->array [self::PAGES] [$i] = $this->createLink ( $link, $i );
		}
		
		if ($this->actualPage < $this->totalPages)
			$this->array [self::GOTO_NEXT] = array (self::PAGE => $this->actualPage + 1, self::LINK => $this->createLink ( $link, $this->actualPage + 1 ) );
		if ($this->actualPage + $this->pagesPerNav <= $this->totalPages)
			$this->array [self::GOTO_NEXT_X] = array (self::PAGE => $this->actualPage + $this->pagesPerNav, self::LINK => $this->createLink ( $link, $this->actualPage + $this->pagesPerNav ) );
		if ($this->indexPageEnd < $this->totalPages)
			$this->array [self::GOTO_LAST] = array (self::PAGE => $this->totalPages, self::LINK => $this->createLink ( $link, $this->totalPages ) );
		
		$this->array [self::LINK_PAGE] = $this->linkPage;
		$this->array [self::LINK_SEP] = $this->linkSep;
		$this->array [self::PARAM_PAGE_NUMBER] = $this->useGeneralParam ? $this->GeneralParamPageNumber : $this->paramPageNumber;
		$this->array [self::PAGES_PER_NAV] = $this->pagesPerNav;
		$this->array [self::TOTAL_RECORDS] = $this->totalRecords;
		return true;
	}
	
	/**
	 * Zwraca string reprezentujący kod html pager'a
	 * 
	 * @return string
	 */
	protected function toString() {
		
		if ($this->totalRecords <= $this->RecordsPerPage)
			return '';
		$_str = '';
		$sep = '&#160;&#160;';
		if (isset ( $this->array [self::GOTO_FIRST] ))
			$_str .= $this->createHTMLLink ( 'Pierwsza strona', $this->array [self::GOTO_FIRST] [self::LINK], '<img src="_images/first.png" alt="" />' ) . $sep;
		if (isset ( $this->array [self::GOTO_PREV_X] ))
			$_str .= $this->createHTMLLink ( $this->array [self::PAGES_PER_NAV] . ' stron(y) do tyłu', $this->array [self::GOTO_PREV_X] [self::LINK], '<img src="_images/prevprev.png" alt="" />' ) . $sep;
		if (isset ( $this->array [self::GOTO_PREV] ))
			$_str .= $this->createHTMLLink ( 'Poprzednia strona', $this->array [self::GOTO_PREV] [self::LINK], '<img src="_images/prev.png" alt="" />' ) . $sep;
		
		foreach ( $this->array [self::PAGES] as $_page => $_pageLink ) {
			if (! $_pageLink)
				$_str .= '<li class="selected">' . $_page . '</li>';
			else
				$_str .= $this->createHTMLLink ( "Strona " . $_page, $_pageLink, $_page );
			$_str .= $sep;
		}
		
		if (isset ( $this->array [self::GOTO_NEXT] ))
			$_str .= $sep . $this->createHTMLLink ( 'Następna strona', $this->array [self::GOTO_NEXT] [self::LINK], '<img src="_images/next.png" alt="" />' );
		if (isset ( $this->array [self::GOTO_NEXT_X] ))
			$_str .= $sep . $this->createHTMLLink ( $this->array [self::PAGES_PER_NAV] . ' stron(y) do przodu', $this->array [self::GOTO_NEXT_X] [self::LINK], '<img src="_images/nextnext.png" alt="" />' );
		if (isset ( $this->array [self::GOTO_LAST] ))
			$_str .= $sep . $this->createHTMLLink ( 'Ostatnia strona', $this->array [self::GOTO_LAST] [self::LINK], '<img src="_images/last.png" alt="" />' );
		
		return $_str;
	}
	
	/**
	 * Generuje html podanego linku
	 * 
	 * @param string $title tytuł linku
	 * @param string $link link
	 * @param string $text text linku
	 * return string
	 */
	protected function createHTMLLink($title, $link, $text) {
		return '<li><a title="' . $title . '" href="' . $link . '">' . $text . '</a></li>';
	}
	
	protected function createLink($link, $page) {
		return $this->userWholeLink ? str_replace ( '#PAGE#', $page, $link ) : $link . $page;
	}
}
?>