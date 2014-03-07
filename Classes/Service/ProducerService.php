<?php

/**
 * encapsulates logic for developers to have a simple interface to
 * send messages to the queue
 */
class Tx_Amqp_Service_ProducerService implements t3lib_Singleton {

	/**
	 * @var Tx_Amqp_Messaging_AMQPService
	 */
	protected $amqpService;

	public function __construct() {
		$connectionFactory = Tx_Amqp_Util_ConfigurationHelper::getConnectionFactory();
		$this->amqpService = new Tx_Amqp_Messaging_AMQPService($connectionFactory);
	}

	/**
	 * send some object as message to the queue
	 *
	 * If $message is not a string, it will be converted to such.
	 * Objects and arrays will be JSON encoded, Primitive types
	 * will be casted into a string.
	 *
	 * If the $silent parameter is set to true (default) any exceptions from the
	 * service are suppressed. The return value is true or false then.
	 *
	 * @param array|object|string $message
	 * @param string $queue
	 * @param bool $silent don't issue any exceptions
	 * @throws Exception
	 * @throws PhpAmqpLib\Exception\AMQPRuntimeException
	 * @return bool if message was successfully send
	 */
	public function send($message, $queue, $silent = TRUE) {
		$message = $this->castMessageToString($message);
		$amqpMessage = new \PhpAmqpLib\Message\AMQPMessage($message);
		try {
			$this->amqpService->send($amqpMessage, '', $queue);
			return TRUE;
		} catch(\PhpAmqpLib\Exception\AMQPRuntimeException $e) {
			if($silent === FALSE) {
				throw $e;
			}
			return FALSE;
		}
	}

	/**
	 * converts any given variable into a string
	 *
	 * @param $message
	 * @return string
	 * @throws RuntimeException
	 */
	protected function castMessageToString($message) {
		if(is_object($message) || is_array($message)) {
			$message = json_encode($message);
			if($message === FALSE) {
				throw new RuntimeException(sprintf(
					'%s could not be casted to string. Message is "%s".',
					gettype($message),
					json_last_error_msg()
				));
			}
		} else {
			$message = (string)$message;
		}
		return $message;
	}

} 