<?php

namespace App\Observer;

abstract class AObserver
{
    private $listeners = [];
    private $eventTrigger;
    
    /**
     * attach
     *
     * @param  mixed $eventParam
     * @param  mixed $listener
     * @return bool
     */
    public function on($eventParam, $listener): bool
    {
        $_events = [];
        if (gettype($eventParam) == "array") {
            $_events = $eventParam;
        }
        if (gettype($eventParam) == "string") {
            $_events[] = $eventParam;
        }
        foreach ($_events as $event) {
            if (!isset($this->listeners[$event])) {
                $this->listeners[$event] = [];
            }
            foreach ($this->listeners[$event] as $key => $_listener) {
                if ($_listener == $listener) {
                    return false;
                }
            }

            $this->listeners[$event][] = $listener;
        }

        return true;
    }
    
    /**
     * detach
     *
     * @param  mixed $event
     * @param  mixed $listener
     * @return bool
     */
    public function off($event, $listener): bool
    {
        if (!isset($this->listeners[$event])) {
            return false;
        }
        foreach ($this->listeners[$event] as $key => $_listener) {
            if ($_listener == $listener) {
                unset($this->listeners[$event][$key]);
                return true;
            }
        }
        return false;
    }

    /**
     * getEventTrigger
     *
     * @return string
     */
    public function getEventTrigger(): string
    {
        return $this->eventTrigger;
    }

    /**
     * toArray
     *
     * @param  mixed $event
     * @return object
     */
    public function toArray(string $event): object
    {
        $this->eventTrigger = $event;
        return $this;
    }

    /**
     * notify
     *
     * @param  mixed $event
     * @return void
     */
    public function notify($event, $countryСode, $data): void
    {
        foreach ($this->listeners[$event] as $_listener) {
            if ($_listener instanceof \Closure) {
                $_listener($countryСode, $data);
            } else {
                //$_listener->update($this->toArray($event));
            }
        }
    }
}