<?php
/**
 * Boolean Attribute
 *
 * Defines the Lift\Playbook\UI|Boolean_Attribute class, which all template boolean attributes should
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
 * Class: Boolean Attribute
 *
 * @since  v2.0.0
 */
class Boolean_Attribute extends Base_Attribute implements Attribute {

	/**
	 * Constructor
	 *
	 * @param string $name  The name of the attribute.
	 * @param bool   $value The value of the attribute.
	 */
	public function __construct( string $name, $value ) {
		if ( $this->is_valid( $value ) ) {
			$this->type = 'boolean';
			parent::__construct( $name, $value );
		}
	}

	/**
	 * Is valid
	 *
	 * @throws Playbook_Strict_Type_Exception Thrown if the value is not a boolean.
	 * @param mixed $value The value to ensure validity.
	 * @return boolean
	 */
	public function is_valid( $value ) {
		if ( ! is_bool( $value ) ) {			
			if ( $this->use_strict ) {
				throw new Playbook_Strict_Type_Exception( 'Expected value to be a boolean, ' . gettype( $value ) . ' given.' );
			}
			return false;
		}
		return true;
	}
}