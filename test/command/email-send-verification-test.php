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

class Email_Send_Verification_Test extends Test\Lib\Domain_Services_Client_Test_Case {

	public function test_command_instance_success(): void {
		$email = 'test@example.com';

		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Email\Send\Verification',
			Command\Command_Interface::PARAMS => [
				Command\Command_Interface::KEY_EMAIL => $email,
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-event-ack-test-1',
		];

		$command = new Command\Email\Send\Verification( new Entity\Email_Address( $email ) );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Email\Send\Verification::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertArraysEqual( $mock_command_data, $actual_command_array );
	}
}
