<?php

class Cron_Task {
	public function run() {
		$charities = Charity::all();
		$today = new DateTime;
		foreach ($charities as $c) {
		DB::table('statistics')->insert(array('charity_id' => $c->id));
		DB::table('statistics')->insert(array('day' => $today));
		DB::table('statistics')->insert(array('people_total' => $c->people_total));
		DB::table('statistics')->insert(array('donation_total' => $c->donation_total));
	}
	}
}