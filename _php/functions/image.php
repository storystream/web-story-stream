<?php
/*
Odczytuje obrazek w jednym z formatow: jpg, gif, png.

03.02.2005
*/
function ImgCreateFromAny($filename)
{
	$imginfo=getimagesize($filename);
	$typ=$imginfo[2];

	if($typ==1)
	{
		$imgduzy=imagecreatefromgif($filename);
	}
	else if ($typ==2)
	{
		$imgduzy=imagecreatefromjpeg($filename);
	}
	else if ($typ==3)
	{
		$imgduzy=imagecreatefrompng($filename);
	}
	else
	{
		return false;
	}
	
	return $imgduzy;
}

/*
Zwraca uchwyt do zmniejszonego obrazka. Nie rusza mniejszych obrazkow niz
podane wymiary ($scaledown), wieksze przeskalowuje proporcjonalnie, tak
zeby sie zmiescily w podanych wymiarach.
*/
function ImgScale($filename, $maxw, $maxh, $scaledown=true, $proportional=true)
{
	$info=getimagesize($filename);
	$imgduzy=ImgCreateFromAny($filename);
	$w=$info[0];
	$h=$info[1];

	if(empty($imgduzy) || empty($info))
	{
		return false;
	}
	else
	{
		if($proportional)
		{
			$wsp=min(($maxw/$w),($maxh/$h));
			if($scaledown && $wsp>1)
				$wsp=1;				//mniejsze obrazki zostaw tak jak sa
			$h2=ceil($h*$wsp);
			$w2=ceil($w*$wsp);
		}
		else		//nie skaluj proporcjonalnie, tylko dokładnie do zadanych wymiarów
		{
			$h2=$maxh;
			$w2=$maxw;
		}

		$imgmaly=imagecreatetruecolor($w2,$h2);
		imagecopyresampled($imgmaly,$imgduzy,0,0,0,0,$w2,$h2,$w,$h);

		return $imgmaly;
		//imagepng($imgmaly,$thumb_target_filepath);
	}
}

/*
Zwraca uchwyt do przeskalowanego obrazka. Nie rusza mniejszych obrazkow niz
podane wymiary (gdy $dont_touch_smaller_images=true).

Możliwe style skalowania:
standard - dokładnie do zadanych wymiarów
proportional - Traktuje podane wymiary jak maksymalne. Skaluje obrazek tak, aby
  zachować proporcje oryginału, dlatego wynikowy obrazek może być mniejszy niż
  zadane wymiary.
crop - kadruje obrazek tak, aby zachować proporcje i jednocześnie aby wynikowy
  obrazek miał dokładnie takie wymiary, jak podano. W praktyce oznacza to, że
  obcięte zostaną boki oryginalnego obrazka.

Zwraca false w przypadku błędu.
*/
function ImgScale2($filename, $maxw, $maxh, $style='proportional', $dont_touch_smaller_images=false)
{
	$info=getimagesize($filename);
	$imgduzy=ImgCreateFromAny($filename);
	$w=$info[0];
	$h=$info[1];

	if(empty($imgduzy) || empty($w) || empty($h))
		return false;

	//nie ruszaj mniejszych obrazków
	if($dont_touch_smaller_images && $w<=$maxw && $h<=$maxh)
		return $imgduzy;

	if($style=='crop')
	{
		//1. znajdź maksymalną szerokość i wysokość proporcjonalną do podanych
		//wymiarów $maxw i $maxh, ale mieszczącą się wewnątrz oryginalnego obrazka
		$wsp=min(($w/$maxw),($h/$maxh));
		$w2=ceil($maxw*$wsp);
		$h2=ceil($maxh*$wsp);
		
		//2. Znajdź takie x i y, aby prostokąt o wymiarach ($w2, $h2) był na
		//środku oryginalnego obrazka. Wiadomo, że jedna z tych wartości (x albo y)
		//będzie równa 0.
		$x=round(($w-$w2)/2);
		$y=round(($h-$h2)/2);

		//3. Skalujemy!
		$imgmaly=imagecreatetruecolor($maxw,$maxh);
		imagecopyresampled($imgmaly,$imgduzy,0,0,$x,$y,$maxw,$maxh,$w2,$h2);

		return $imgmaly;
	}
	elseif($style=='proportional')
	{
		$wsp=min(($maxw/$w),($maxh/$h));
		$w2=ceil($w*$wsp);
		$h2=ceil($h*$wsp);
	}
	else		//nie skaluj proporcjonalnie, tylko dokładnie do zadanych wymiarów
	{
		$w2=$maxw;
		$h2=$maxh;		
	}

	$imgmaly=imagecreatetruecolor($w2,$h2);
	imagecopyresampled($imgmaly,$imgduzy,0,0,0,0,$w2,$h2,$w,$h);

	return $imgmaly;
}
?>