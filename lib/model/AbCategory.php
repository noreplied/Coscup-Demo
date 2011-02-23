<?php

/**
 * Subclass for representing a row from the 'ab_category' table.
 *
 * 
 *
 * @package lib.model
 */ 
class AbCategory extends BaseAbCategory
{
	public function __toString()
	{
		return $this->getCatName();
	}
}
