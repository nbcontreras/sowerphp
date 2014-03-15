<?php

/**
 * SowerPHP: Minimalist Framework for PHP
 * Copyright (C) SowerPHP (http://sowerphp.org)
 * 
 * Este programa es software libre: usted puede redistribuirlo y/o
 * modificarlo bajo los términos de la Licencia Pública General GNU
 * publicada por la Fundación para el Software Libre, ya sea la versión
 * 3 de la Licencia, o (a su elección) cualquier versión posterior de la
 * misma.
 * 
 * Este programa se distribuye con la esperanza de que sea útil, pero
 * SIN GARANTÍA ALGUNA; ni siquiera la garantía implícita
 * MERCANTIL o de APTITUD PARA UN PROPÓSITO DETERMINADO.
 * Consulte los detalles de la Licencia Pública General GNU para obtener
 * una información más detallada.
 * 
 * Debería haber recibido una copia de la Licencia Pública General GNU
 * junto a este programa.
 * En caso contrario, consulte <http://www.gnu.org/licenses/gpl.html>.
 */

/**
 * Clase para cargar una página PHP
 * @author Esteban De La Fuente Rubio, DeLaF (esteban[at]delaf.cl)
 * @version 2014-03-15
 */
class PhpPage {

	/**
	 * Método que renderiza una página PHP
	 * @param file Archivo que se desea renderizar
	 * @param vars Arreglo con variables que se desean pasar
	 * @return Buffer de la página renderizada
	 * @author Esteban De La Fuente Rubio, DeLaF (esteban[at]delaf.cl)
	 * @version 2012-10-19
	 */
	public static function render ($file, $vars = array()) {
		return self::_evaluate($file, $vars);
	}

	/**
	 * Método que evalua el archivo de la vista utilizando las variables
	 * indicadas en $__dataForView
	 * @param __viewFn Archivo con la página que se desea renderizar
	 * @param __dataForView Variables para la página a renderizar
	 * @return Buffer de la página renderizada
	 * @author CakePHP
	 */
	private static function _evaluate ($__viewFn, $__dataForView=array()) {
		extract ($__dataForView, EXTR_SKIP);
		ob_start ();
		include $__viewFn;
		return ob_get_clean ();
	}

}
