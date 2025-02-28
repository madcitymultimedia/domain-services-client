# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Response](../namespaces/automattic-domain-services-client-response.md)[\Event](../namespaces/automattic-domain-services-client-response-event.md)\Ack

## Summary:

Response of an `Event\Ack` command.


---

### Methods

* public [__construct()](#method___construct)
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_data_by_key()](#method_get_data_by_key)
* public [get_runtime()](#method_get_runtime)
* public [get_server_txn_id()](#method_get_server_txn_id)
* public [get_status()](#method_get_status)
* public [get_status_description()](#method_get_status_description)
* public [get_timestamp()](#method_get_timestamp)
* public [is_success()](#method_is_success)

---

### Details

* File: [lib/response/event/ack.php](../../lib/response/event/ack.php)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Response\Data_Trait](../classes/Automattic-Domain-Services-Client-Response-Data-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Command\Event\Ack](../classes/Automattic-Domain-Services-Client-Command-Event-Ack.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
final public __construct(array  data = []) : mixed
```

##### Summary

`Response` object constructor

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$data** | array | [] |

##### Returns:

```
mixed
```

---

<a id="method_get_client_txn_id"></a>
### get_client_txn_id

```
final public get_client_txn_id() : string
```

##### Summary

Gets the client transaction ID that was sent with the request. Useful for logging and debugging.

##### Returns:

```
string
```

---

<a id="method_get_data_by_key"></a>
### get_data_by_key

```
final public get_data_by_key(string  key) : array|mixed|null
```

##### Summary

Returns the response value for the given key, if it exists.

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$key** | string |  |

##### Returns:

```
array|mixed|null
```

---

<a id="method_get_runtime"></a>
### get_runtime

```
final public get_runtime() : float
```

##### Summary

Gets the runtime (in seconds) the processing of this command took on the back-end.

##### Returns:

```
float
```

---

<a id="method_get_server_txn_id"></a>
### get_server_txn_id

```
final public get_server_txn_id() : string
```

##### Summary

Gets the server transaction ID that was generated by the Automattic Domain Services back-end for this request.

##### Description

Useful for logging and debugging.

##### Returns:

```
string
```

---

<a id="method_get_status"></a>
### get_status

```
final public get_status() : int
```

##### Summary

Gets the response status code

##### See Also:

 * [\Automattic\Domain_Services_Client\Response\Code](../classes/Automattic-Domain-Services-Client-Response-Code.md)

##### Returns:

```
int
```

---

<a id="method_get_status_description"></a>
### get_status_description

```
final public get_status_description() : string
```

##### Summary

Gets the response status description

##### See Also:

 * [\Automattic\Domain_Services_Client\Response\Code](../classes/Automattic-Domain-Services-Client-Response-Code.md)

##### Returns:

```
string
```

---

<a id="method_get_timestamp"></a>
### get_timestamp

```
final public get_timestamp() : int
```

##### Summary

Gets the timestamp this response was generated.

##### Returns:

```
int
```

---

<a id="method_is_success"></a>
### is_success

```
final public is_success() : bool
```

##### Summary

Gets whether the request succeeded.

##### Returns:

```
bool
```
