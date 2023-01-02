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

namespace Automattic\Domain_Services\Test\Lib\Mock;

use Automattic\Domain_Services\{Command};

function get_mock_response( Command\Command_Interface $command, ?string $domain, string $response_type ): array {
	$command_name = $command::get_name();
	$response_requested = $command_name . '-' . $response_type;

	switch ( $response_requested ) {
		case 'Dns_Get-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => 'f3ef7b83-54b8-4f9c-a0a0-bf94374f1563.local-isolated-test-request',
				'timestamp' => 1668798703,
				'runtime' => 0.0014,
				'data' => [
					'dns_records' => [
						'domain' => $domain,
						'record_sets' => [
							[
								'name' => '@',
								'type' => 'A',
								'ttl' => 300,
								'data' =>
									[
										'1.2.3.4',
										'5.6.7.8',
									],
							],
							[
								'name' => '*',
								'type' => 'CNAME',
								'ttl' => 14400,
								'data' =>
									[
										'test-domain-name.com.',
									],
							],
						],
					],
				],
			];
			break;

		case 'Dns_Set-success':
			$response = [
				'data' => [
					'change_set' => [
						'domain' => $domain,
						'records_added' => [
							[
								'name' => '@',
								'type' => 'A',
								'ttl' => 300,
								'data' =>
									[
										'9.10.11.12',
										'13.14.15.16',
									],
							],
						],
						'records_deleted' => [
							[
								'name' => '@',
								'type' => 'A',
								'ttl' => 300,
								'data' => [
									'1.2.3.4',
									'5.6.7.8',
								],
							],
							[
								'name' => '*',
								'type' => 'CNAME',
								'ttl' => 14400,
								'data' => [
									'test-domain-name.com.',
								],
							],
						],
					],
				],
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => '72f6f165-1328-4989-912b-1dd936e11866.local-isolated-test-request',
				'timestamp' => 1668865903,
				'runtime' => 0.0037,
			];
			break;

		case 'Domain_Set_Contacts-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id-1',
				'server_txn_id' => '729062dd-702c-4a9a-8457-972f72c56184.local-isolated-test-request',
				'timestamp' => 1668625533,
				'runtime' => 0.0069,
				'data' =>
					[
						'contacts' =>
							[
								'owner' =>
									[
										'contact_id' => 'SP1:P-ABC1234',
										'contact_information' => null,
										'contact_disclosure' => 'none',
									],
							],
					],
			];
			break;

		case 'Event_Ack-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => 'a7903cee-043b-4763-b078-737308b5d284.local-isolated-test-request',
				'timestamp' => 1668886944,
				'runtime' => 0.0053,
			];
			break;

		case 'Event_Details-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => '7577b593-0cc4-457a-ac91-a71ea435effd.local-isolated-test-request',
				'timestamp' => 1668886944,
				'runtime' => 0.0041,
				'data' => [
					'event' => [
						'id' => 1234,
						'event_class' => 'Domain_Set_Nameservers',
						'event_subclass' => 'Success',
						'event_data' => '[]',
						'object_type' => 'domain',
						'object_id' => 'example.com',
						'event_date' => '2022-08-01 01:23:45',
						'acknowledged_date' => '2022-08-02 06:07:08',
					],
				],
			];
			break;

		case 'Event_Enumerate-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => 'e5b5f2de-099f-4469-9e0b-724e53d3f241.local-isolated-test-request',
				'timestamp' => 1668865904,
				'runtime' => 0.0028,
				'data' => [
					'total_count' => 3,
					'events' => [
						[
							'id' => 1,
							'event_class' => 'Domain_Set_Nameservers',
							'event_subclass' => 'Success',
							'event_data' => '[]',
							'object_type' => 'domain',
							'object_id' => 'example.com',
							'event_date' => '2022-01-01 00:00:00',
							'acknowledged_date' => '2022-01-01 10:00:00',
						],
						[
							'id' => 2,
							'event_class' => 'Domain_Set_Nameservers',
							'event_subclass' => 'Success',
							'event_data' => '[]',
							'object_type' => 'domain',
							'object_id' => 'example.com',
							'event_date' => '2022-02-01 00:00:00',
							'acknowledged_date' => NULL,
						],
						[
							'id' => 3,
							'event_class' => 'Domain_Set_Nameservers',
							'event_subclass' => 'Success',
							'event_data' => '[]',
							'object_type' => 'domain',
							'object_id' => 'example.com',
							'event_date' => '2022-03-01 00:00:00',
							'acknowledged_date' => NULL,
						],
					],
					'request_params' => [
						'filter' => NULL,
						'first' => 0,
						'limit' => 50,
						'date_start' => NULL,
						'date_end' => NULL,
						'show_acknowledged' => true,
					],
				],
			];
			break;

		case 'Contact_Details-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => '5ffdba44-eeec-4647-9cc4-27cdf8352efc.local-isolated-test-request',
				'timestamp' => 1669075517,
				'runtime' => 0.0019,
				'data' => [
					'contact_information' => [
						'first_name' => 'John',
						'last_name' => 'Doe',
						'organization' => '',
						'address_1' => 'Avenida dos Bandeirantes 123',
						'address_2' => 'Apto 12',
						'postal_code' => '12345-678',
						'city' => 'Sao Paulo',
						'state' => '',
						'country_code' => 'BR',
						'email' => 'john.doe@automattic.com',
						'phone' => '+55.11987654321',
						'fax' => null,
					],
					'validated' => true,
					'verified' => false,
				],
			];
			break;

		case 'Domain_Check-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => '3b581197-d93a-466a-957d-3569cb28279c.local-isolated-test-request',
				'timestamp' => 1669075519,
				'runtime' => 0.0013,
				'data' => [
					'domains' => [
						'test-domain-name-1.com' => [
							'available' => true,
							'fee_class' => 'standard',
						],
						'test-domain-name-2.com' => [
							'available' => true,
							'fee_class' => 'standard',
						],
						'test-domain-name-3.com' => [
							'available' => false,
							'fee_class' => 'standard',
						],
					],
				],
			];
			break;

		default:
			throw new \RuntimeException( 'Unknown command used in mock response request' );
	}

	return $response;
}
