<?
/**
* Класс созданый для демонстрации в ходе обсуждения на одном из форумов
* @author Александр Воробьев
* @version 1.0
*/
class Chess{
	const FIGURE_PAWN = 1;  // пешка
	const FIGURE_BISHOP = 2; //слон
	const FIGURE_KNIGHT = 3; // конь
	const FIGURE_CASTLE = 4; // ладья
	const FIGURE_QUEEN = 5; // ферзь
	const FIGURE_KING = 6; //король
	
	/**
	*матрица доступных ходов
	*/
	private static $matrix = array(
		self::FIGURE_PAWN => array(
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,1,1,1,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,2,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
		),
		self::FIGURE_BISHOP => array(
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(1,1,1,1,1,1,1,2,1,1,1,1,1,1,1),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),
		),
		self::FIGURE_KNIGHT => array(
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,1,0,1,0,0,0,0,0,0),
			array(0,0,0,0,0,1,0,0,0,1,0,0,0,0,0),
			array(0,0,0,0,0,0,0,2,0,0,0,0,0,0,0),
			array(0,0,0,0,0,1,0,0,0,1,0,0,0,0,0),
			array(0,0,0,0,0,0,1,0,1,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
		),
		self::FIGURE_CASTLE => array(
			array(1,0,0,0,0,0,0,0,0,0,0,0,0,0,1),
			array(0,1,0,0,0,0,0,0,0,0,0,0,0,1,0),
			array(0,0,1,0,0,0,0,0,0,0,0,0,1,0,0),
			array(0,0,0,1,0,0,0,0,0,0,0,1,0,0,0),
			array(0,0,0,0,1,0,0,0,0,0,1,0,0,0,0),
			array(0,0,0,0,0,1,0,0,0,1,0,0,0,0,0),
			array(0,0,0,0,0,0,1,0,1,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,2,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,1,0,1,0,0,0,0,0,0),
			array(0,0,0,0,0,1,0,0,0,1,0,0,0,0,0),
			array(0,0,0,0,1,0,0,0,0,0,1,0,0,0,0),
			array(0,0,0,1,0,0,0,0,0,0,0,1,0,0,0),
			array(0,0,1,0,0,0,0,0,0,0,0,0,1,0,0),
			array(0,1,0,0,0,0,0,0,0,0,0,0,0,1,0),
			array(1,0,0,0,0,0,0,0,0,0,0,0,0,0,1),
		),
		self::FIGURE_QUEEN => array(
			array(1,0,0,0,0,0,0,1,0,0,0,0,0,0,1),
			array(0,1,0,0,0,0,0,1,0,0,0,0,0,1,0),
			array(0,0,1,0,0,0,0,1,0,0,0,0,1,0,0),
			array(0,0,0,1,0,0,0,1,0,0,0,1,0,0,0),
			array(0,0,0,0,1,0,0,1,0,0,1,0,0,0,0),
			array(0,0,0,0,0,1,0,1,0,1,0,0,0,0,0),
			array(0,0,0,0,0,0,1,1,1,0,0,0,0,0,0),
			array(1,1,1,1,1,1,1,2,1,1,1,1,1,1,1),
			array(0,0,0,0,0,0,1,1,1,0,0,0,0,0,0),
			array(0,0,0,0,0,1,0,1,0,1,0,0,0,0,0),
			array(0,0,0,0,1,0,0,1,0,0,1,0,0,0,0),
			array(0,0,0,1,0,0,0,1,0,0,0,1,0,0,0),
			array(0,0,1,0,0,0,0,1,0,0,0,0,1,0,0),
			array(0,1,0,0,0,0,0,1,0,0,0,0,0,1,0),
			array(1,0,0,0,0,0,0,1,0,0,0,0,0,0,1),
		),
		self::FIGURE_KING => array(
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,1,1,1,0,0,0,0,0,0),
			array(0,0,0,0,0,0,1,2,1,0,0,0,0,0,0),
			array(0,0,0,0,0,0,1,1,1,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
		)
	);
	/**
	* прокси для преобразования буквенных в цифровые координаты
	*/
	private static $proxy = array('a'=>0,'b'=>1,'c'=>2,'d'=>3,'e'=>4,'f'=>5,'g'=>6,'h'=>7);
	/**
	* Проверка допустимости хода фигурой без учета наличия прочих фигур на доске
	* рокировку также не учитывает
	* @param string $from ячейка с которой ходим в формате буква+цифра (например "a2")
	* @param string $to ячейка на которую ходим в формате буква+цифра (например "a2")
	* @param integer $figure тип шахматной фигуры
	* @param boolean $isBlack - цвет: true - черный; false - белый
	* @return boolean
	*/
	public static function checkMove($from,$to,$figure,$isBlack)
	{
		$posFrom = self::getPosition($from);
		if ($posFrom === false) return false;
		$posTo = self::getPosition($to);
		if ($posTo === false) return false;
		$deltaX = $posTo['x'] - $posFrom['x'];
		$deltaY = $posTo['y'] - $posFrom['y'];
		$matrixX = ($isBlack) ? 7 + $deltaX : 7 - $deltaX;
		$matrixY = ($isBlack) ? 7 + $deltaY : 7 - $deltaY;
		return (self::$matrix[$figure][$matrixX][$matrixY] == 1);
	}
	/**
	* Преобразование координат в цифровые и проверка на границы доски
	* @param string $coord координаты ячейки в формате буква+цифра (например "a2")
	* @return mixed  Если координата валидная array('x'=>...,'y'=>...); иначе false
	*/
	public static function getPosition($coord)
	{
		if (strlen($coord) != 2) return false;
		$y=$coord[0];
		$x=intval($coord[1]) - 1;
		if (!array_key_exists($y,self::$proxy) || $x < 0 || $x > 7) return false;
		return array('x' => $x, 'y' => self::$proxy[$y]);
	}
}

var_dump(Chess::checkMove('a1','a2',Chess::FIGURE_PAWN,false)); // можно
var_dump(Chess::checkMove('a1','a2',Chess::FIGURE_PAWN,true)); // нельзя
var_dump(Chess::checkMove('a1','a2',Chess::FIGURE_KNIGHT,true)); // нельзя
var_dump(Chess::checkMove('a1','c2',Chess::FIGURE_KNIGHT,false)); // можно

?>