<?php
/**
 * Numeric Attribute
 *
 * Defines the Lift\Playbook\UI|Numeric_Attribute class, which all template Numeric attributes should
 * instantiate as their corresponding class properties.
 *
 * @since  v2.0.0
 * @package  Lift\Playbook
 * @subpackage  UI
 */

namespace Lift\Playbook\UI;
use Lift\Playbook\Playbook_Strict_Type_Exception;
use Lift\Playbook\Interfaces\Attribute;

/**
 * Class: Numeric Attribute
 *
 * @since  v2.0.0
 */
class Numeric_Attribute extends Base_Attribute implements Attribute {

	/**
	 * Constructor
	 *
	 * @param string        $name   The name of the attribute.
	 * @param int|float     $value  The value of the attribute.
	 * @param null|callable $setter An optional callable setter, passed the desired value.
	 * @param null|callable $getter An optional callable getter, passed the current value.
	 */
	public function __construct( string $name, $value, callable $setter = null, callable $getter = null ) {
		if ( $this->is_valid( $value ) ) {
			$this->type = gettype( $value );
			parent::__construct( $name, $value, $setter, $getter );
		}
	}

	/**
	 * Is valid
	 *
	 * @throws Playbook_Strict_Type_Exception Thrown if the value is not numeric.
	 * @param mixed $value The value to ensure validity.
	 * @return boolean
	 */
	public function is_valid( $value ) {
		if ( ! is_numeric( $value ) ) {
			if ( $this->use_strict ) {
				throw new Playbook_Strict_Type_Exception( 'Expected value to be numeric, ' . gettype( $value ) . ' given.' );
			}
			return false;
		}
		return true;
	}
}
