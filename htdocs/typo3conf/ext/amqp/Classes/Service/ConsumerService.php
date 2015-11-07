<?php

/**
 * encapsulates logic for developers to have a simple interface to
 * receive messages from the queue
 */
class Tx_Amqp_Service_ConsumerService implements t3lib_Singleton {

	/**
	 * @var Tx_Amqp_Messaging_AMQPService
	 */
	protected $amqpService;

	/**
	 * @var array
	 */
	protected $consumerConfiguration;

	/**
	 * @var Tx_Extbase_Object_ObjectManager
	 */
	protected $objectManager;

	public function __construct() {
		$connectionFactory = Tx_Amqp_Util_ConfigurationHelper::getConnectionFactory();
		$this->amqpService = new Tx_Amqp_Messaging_AMQPService($connectionFactory);
		$this->objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
	}

	/**
	 * call all consumers listening to the queue and execute them
	 *
	 * @param $queueName
	 * @param $messageString
	 */
	public function notifyConsumers($queueName, $messageString) {
		$consumers = $this->getConsumers($queueName);
		$message = $this->castStringToMessage($messageString);

		foreach($consumers as $consumer) {
			/** @var Tx_Amqp_Messaging_ConsumerInterface $consumer */
			$consumer->execute($message, $queueName);
		}
	}

	/**
	 * get listeners for the named queue
	 *
	 * @param string $queueName
	 * @return array<Tx_Amqp_Messaging_ConsumerInterface>
	 * @throws InvalidArgumentException
	 */
	protected function getConsumers($queueName) {
		$consumerConfigurations = Tx_Amqp_Util_ConfigurationHelper::getRegisteredConsumerConfiguration($queueName);
		$consumers = array();
		foreach($consumerConfigurations as $key=>$consumerConfiguration) {
			$className = trim($consumerConfiguration['className']);
			$consumerInstance = $this->objectManager->get($className);
			if(!$consumerInstance instanceof Tx_Amqp_Messaging_ConsumerInterface) {
				throw new InvalidArgumentException(sprintf(
					'%s does not implement the Tx_Amqp_Messaging_ConsumerInterface interface',
					$className
				));
			}
			$consumers[] = $consumerInstance;
		}

		return $consumers;
	}

	/**
	 * converts a given string into an assoc array, if it looks like json
	 *
	 * @param $messageString
	 * @return string|array|object
	 * @see Tx_Amqp_Service_ProducerService::castMessageToString
	 */
	protected function castStringToMessage($messageString) {
		$result = json_decode($messageString, TRUE);
		return $result === NULL ? $messageString : $result;
	}
} 