<?php
function md5Sign($sp8338f0, $sp9684a3) { $sp8338f0 = $sp8338f0 . $sp9684a3; return md5($sp8338f0); } function md5Verify($sp8338f0, $sp23eef6, $sp9684a3) { $sp8338f0 = $sp8338f0 . $sp9684a3; $spd75918 = md5($sp8338f0); if ($spd75918 == $sp23eef6) { return true; } else { return false; } }