<?php

include 'db_config.php';
$today=date("Y-m-d");
$abnb= new dbQry();  // I create my db object here, this is include everywhere so I can always use it
class dbQry
{

	private  $pdo;

	public function __construct()
	{
		$this->pdo = new PDO(DSN,USER,PASS);
	}

	public function set_booking($id,$fname,$lname,$email,$date,$duration)  // insert the reservation
	{
		$query="INSERT INTO bookings
							(place_id,
							first_name,
							last_name,
							email,
							start_date,
							duration)
				VALUES	(	:id ,
							:fname ,
							:lname ,
							:email ,
							:date ,
							:duration );";
		$stmnt=$this->pdo->prepare($query);
		$stmnt->execute(["id"=>$id,"fname"=>$fname,"lname"=>$lname,"email"=>$email,"date"=>$date,"duration"=>$duration ]);
		return $stmnt;

	}

	public function get_states() 	// to fill my search form states dropdown list
	{
		$query='SELECT id,name from states';
		$stmnt=$this->pdo->prepare($query);
		$stmnt->execute();
		return $stmnt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getPlaces($states, $rooms, $guests, $city)  // this is the good one to list places
 	{
		$query= 	'SELECT cities.name as city, states.name as state, places. description as place,
							places.name as name, places.id as placeId, places.price_by_night as price
					FROM 	places
					JOIN 	cities ON places.city_id = cities.id 
					JOIN 	states ON cities.state_id = states.id
					WHERE 	states.name = :states 
					AND		places.number_rooms>= :rooms
					AND		places.max_guest >= :guests 
					AND		cities.name like :city';

		$stmnt=$this->pdo->prepare($query);
		$stmnt->execute(["states"=>$states, "rooms"=>$rooms, "guests"=>$guests,  "city"=>$city ]);
		if($stmnt->rowCount())
		{
					$result=$stmnt->fetchAll(PDO::FETCH_ASSOC);
		
			foreach ($result as $place)
			{
				$query="SELECT  name
						FROM	place_amenity
						JOIN	amenities ON id=place_amenity.amenity_id
						WHERE	place_id=:place";
						$stmnt=$this->pdo->prepare($query);
						$stmnt->execute(["place"=>$place["placeId"]]);
						$amenities=$stmnt->fetchAll(PDO::FETCH_ASSOC);
						
						foreach($amenities as $amenity)
						{
							$place["amenities"][] = $amenity["name"];
						}
						$places[]=$place;
			}
		}
		else {$places=0;}
			return $places;
	}

	/*This function queries the places and returns the places, along with their amenities
	You will NOT need to modify this function to complete your assignment.
	*/
	public	function get_places($state_id, $date, $duration, $num_rooms, $max_guest, $city_id) 
	{
		$query = 'SELECT cities.name AS cityName, places.name AS placeName, places.description AS placeDescription,
		states.name AS stateName, places.id AS placeId, places.price_by_night FROM places
		JOIN cities ON places.city_id = cities.id
		JOIN states ON cities.state_id = states.id
		WHERE cities.state_id = :state_id AND places.number_rooms >= :num_rooms
		AND places.max_guest >= :max_guest AND (cities.id = :city_id OR :city_id = \'\');';
		$stmnt = $this->pdo->prepare($query);
		$stmnt->execute(['state_id' => $state_id, 'num_rooms' => $num_rooms, 'max_guest' => $max_guest, 'city_id' => $city_id]);

		$places = $stmnt->fetchAll(PDO::FETCH_ASSOC);

		if(count($places) == 0) {
			return $places;
		}

		$amenities = $this->get_amenities(array_column($places, 'placeId'));
		$amenitiesGrouped = [];

		foreach($amenities as $amenity)
		{ 
			$amenitiesGrouped[$amenity['place_id']][] = $amenity;
		}

		foreach($places as &$place) {
			$place['amenities'] = $amenitiesGrouped[$place['placeId']];
		}

		return $places;
	}

	/*This fucntion queries the amenities and is only called by the get_places function
	You will NOT need to modify this function to complete your assignment.
	*/
	public	function get_amenities($place_ids) 
	{
		$questionMarks = rtrim(str_repeat('?,', count($place_ids)),',');
		
		$query = "SELECT place_id, `name` FROM amenities 
		JOIN place_amenity ON amenities.id = place_amenity.amenity_id 
		WHERE place_amenity.place_id IN ({$questionMarks}) ORDER BY `name`";

		$stmnt = $this->pdo->prepare($query);
		$stmnt->execute($place_ids);

		return $stmnt->fetchAll(PDO::FETCH_ASSOC);
	}

}





?>