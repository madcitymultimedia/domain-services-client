<?php declare( strict_types=1 );
/*
 * Copyright (c) 2022 Automattic, Inc.
 *
 * This file is part of the Automattic Domain Services Client library.
 *
 * The Automattic Domain Services Client library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, see https://www.gnu.org/licenses.
 */

namespace Automattic\Domain_Services_Client\Test\Command;

use Automattic\Domain_Services_Client\{Command, Entity, Test};

class Dns_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Dns\Set',
			Command\Command_Interface::PARAMS => [
				Command\Command_Interface::KEY_RECORDS => [
					Command\Command_Interface::KEY_DOMAIN => 'test-domain-name.com',
					Command\Command_Interface::KEY_RECORD_SETS => [
						[
							'name' => '@',
							'type' => 'A',
							'ttl' => 3600,
							'data' => [
								'1.2.3.4',
								'5.6.7.8',
							],
						],
						[
							'name' => '@',
							'type' => 'TXT',
							'ttl' => 3600,
							'data' => [
								'data for this TXT record',
							],
						],
					],
				],
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-dns-records-get-test-1',
		];

		$dns_records = Entity\Dns_Records::from_array( $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_RECORDS ] );
		$command = new Command\Dns\Set( $dns_records );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Dns\Set::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertSame( $mock_command_data, $actual_command_array );
	}
}
