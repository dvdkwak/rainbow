<?php

// this will autoload all rainbow classes
foreach(glob(ROOT."system/rainbow/*.php") as $filename) {
  include_once $filename;
}

// this will autoload all rainbow configuration classes
foreach(glob(ROOT."system/rainbow/config/*.php") as $filename) {
  include_once $filename;
}

// this will autoload all rainbow configuration classes
foreach(glob(ROOT."system/rainbow/src/*/*.php") as $filename) {
  include_once $filename;
}

// this will autoload all system classes
foreach(glob(ROOT."system/classes/*.php") as $filename) {
  include_once $filename;
}

// This will make it possible to autoload all models (no sub directories yet)
foreach (glob(ROOT."models/*/*.php") as $filename) {
  include_once $filename;
}
