<?php

/*--------------------------------------------------------*\
	Carousel Navigation
\*--------------------------------------------------------*/

function carouselNavigation($name) {
	$html = '';
	$html .= '<nav class="nav--carousel" id="nav--' . $name . '">';
	$html .= '<button class="carousel__prev carousel__button" type="button">';
	$html .= '<span class="icon__container">' . get__file( '/arrow--left__carousel.svg' ) . '</span>';
	$html .= '</button>';
	$html .= '<button class="carousel__next carousel__button" type="button">';
	$html .= '<span class="icon__container">' . get__file( '/arrow--right__carousel.svg' ) . '</span>';
	$html .= '</button>';
	$html .= '</nav>';

	return $html;
}