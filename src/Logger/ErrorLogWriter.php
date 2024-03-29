<?php

namespace CPB\Extensions\Laminas\Logger
{
    use Laminas\Log\Formatter\Simple as SimpleFormatter;
    use Laminas\Stdlib\ErrorHandler;

    use Laminas\Log\Writer\AbstractWriter;

    /**
     * Class ErrorLogWriter
     *
     * A writer is an object that inherits from Laminas\Log\Writer\AbstractWriter. A writer's responsibility is to record log data to a storage backend.
     *
     * @package CPB\Extensions\Laminas\Logger
     */
    class ErrorLogWriter extends AbstractWriter
    {
        /**
         * Separator between log entries
         *
         * @var string
         */
        protected $logSeparator = PHP_EOL;

        /**
         * Constructor
         *
         * @return Stream
         * @throws Exception\InvalidArgumentException
         * @throws Exception\RuntimeException
         */
        public function __construct()
        {
            if ($this->formatter === null)
            {
                $this->formatter = new SimpleFormatter();
            }
        }

        /**
         * Write a message to the log.
         *
         * @param array $event event data
         * @return void
         * @throws Exception\RuntimeException
         */
        protected function doWrite(array $event)
        {
            error_log($this->formatter->format($event) . $this->logSeparator);
        }

        /**
         * Set log separator string
         *
         * @param  string $logSeparator
         * @return Stream
         */
        public function setLogSeparator($logSeparator)
        {
            $this->logSeparator = (string) $logSeparator;

            return $this;
        }

        /**
         * Get log separator string
         *
         * @return string
         */
        public function getLogSeparator()
        {
            return $this->logSeparator;
        }

        /**
         * Close the stream resource.
         *
         * @return void
         */
        public function shutdown()
        {
            //this gentlemen does not need closing
        }
    }
}
