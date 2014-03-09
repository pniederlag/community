<?php

/**
 * A consumer will be notified if a message appears in a certain queue.
 *
 * Register consumers with Tx_Amqp_Util_ConfigurationHelper::registerConsumer
 * in ext_localconf.php
 */
interface Tx_Amqp_Messaging_ConsumerInterface {

	/**
	 * The $data you get will be highly dependent on the queue. If data is a json object
	 * it will be converted, otherwise a string is given.
	 *
	 * If an exception is thrown during execution, the message will be requeued
	 * and no further consumers for this message are called.
	 *
	 * @param string|array|object $data
	 * @param string $queueName
	 * @throws Exception
	 */
	public function execute($data, $queueName);

} 