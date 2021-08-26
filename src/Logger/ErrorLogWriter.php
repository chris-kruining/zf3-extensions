<?php

namespace CPB\Extensions\Laminas\Logger
{
    use Laminas\Log\Formatter\Simple as SimpleFormatter;
    use Laminas\Stdlib\ErrorHandler;

    use Laminas\Log\Writer\AbstractWriter;

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
         * @param  string|resource|array|Traversable $streamOrUrl Stream or URL to open as a stream
         * @param  string|null $mode Mode, only applicable if a URL is given
         * @param  null|string $logSeparator Log separator string
         * @param  null|int $filePermissions Permissions value, only applicable if a filename is given;
         *     when $streamOrUrl is an array of options, use the 'chmod' key to specify this.
         * @return Stream
         * @throws Exception\InvalidArgumentException
         * @throws Exception\RuntimeException
         */
        public function __construct()
        {
            if ($this->formatter === null) {
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
            $line = $this->formatter->format($event) . $this->logSeparator;
            error_log($line);
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
