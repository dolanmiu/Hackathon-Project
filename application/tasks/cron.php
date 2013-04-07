<?php

class Cron_Task {
	public function run() {
		$charities = Charity::all();
		$today = new DateTime;
		foreach ($charities as $c) {
		DB::table('statistics')->insert(array('charity_id' => $c->id,
										'day' => $today,
										'people_total' => $c->people_total,
										'donation_total' => $c->donation_total, ));
									}
	}
}
