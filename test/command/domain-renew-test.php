<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Command;

use Automattic\Domain_Services\{Command, Entity, Test};

class Domain_Renew_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	use Command\Array_Key_Domain_Trait, Command\Array_Key_Current_Expiration_Year_Trait, Command\Array_Key_Fee_Amount_Trait, Command\Array_Key_Period_Trait;

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Domain_Renew',
			Command\Command_Interface::PARAMS => [
				self::get_domain_name_array_key() => 'test-domain-name.com',
				self::get_current_expiration_year_array_key() => 2022,
				self::get_fee_amount_array_key() => 5.0,
				self::get_period_array_key() => 1,
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-domain-renew-test-1',
		];

		$domain = new Entity\Domain_Name( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_domain_name_array_key() ] );
		$current_expiration_year = $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_current_expiration_year_array_key() ];
		$period = $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_period_array_key() ];
		$fee_amount = $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_fee_amount_array_key() ];
		$command = new Command\Domain\Renew( $domain, $current_expiration_year, $period, $fee_amount );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Domain\Renew::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertArraysEqual( $mock_command_data, $actual_command_array );
	}
}
