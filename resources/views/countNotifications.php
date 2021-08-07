<?php
 echo $notificationCount=\Auth::user()->notifications->where('seen',0)->count();

