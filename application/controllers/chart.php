<?php
class Chart extends Controller {


	function __construct() {
		parent::Controller();
		$this->load->library('googchart');
	}
	
	
	function pie() {
		// Set graph data
		$data = array(
					'IE7' => 22,
					'IE6' => 30.7,
					'IE5' => 1.7,
					'Firefox' => 36.5,
					'Mozilla' => 1.1,
					'Safari' => 2,
					'Opera' => 1.4,
				);
		
		$this->googchart->setChartAttrs( array(
			'type' => 'pie',
			'title' => 'Browser market 2008',
			'data' => $data,
			'legend' => false,
			'size' => array( 400, 300 )
			));
		echo $this->googchart;
	}
	
	function bar() {
		$color = array(
					'#99C754',
					'#54C7C5'
				);
				
			$dataMultiple = array( 
				'Members' => array(
					'10/7' => 2257,
					'10/8' => 13907,
					'10/9' => 7147,
					'10/10' => 9365,
					'10/11' => 6121,
					'10/12' => 8284,
					'10/13' => 10149,
				),
				'Prospects' => array(
					'10/7' => 3003,
					'10/8' => 2150,
					'10/9' => 2167,
					'10/10' => 283,
					'10/11' => 14664,
					'10/12' => 11242,
					'10/13' => 12091,
				),
			);

		$this->googchart->setChartAttrs( array(
			'type' => 'bar-vertical',
			'title' => 'Event Attendance',
			'data' => $dataMultiple,
			'size' => array(550,300),
			'color' => $color,
			'labelsXY' => true,
			'legend' => true,
			'dataLength' => array(0, 16000),
			'axisRange' => array(1, 0, 16000, 2000),
			'valueMarkers' => 'N,000000,0,,12|N,000000,1,,12'
			));
		
		$data['chart'] = $this->googchart;
		$this->googchart->debug;
		$this->load->view('chart/bar', $data);
	}
}
?>