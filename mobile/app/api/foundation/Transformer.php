<?php
//zend by 旺旺ecshop2011所有  禁止倒卖 一经发现停止任何服务
namespace app\api\foundation;

abstract class Transformer implements \app\contracts\transformer\TransformerInterface
{
	public function transformCollection(array $map)
	{
		return array_map(array($this, 'transform'), $map);
	}

	abstract public function transform(array $map);
}

?>
