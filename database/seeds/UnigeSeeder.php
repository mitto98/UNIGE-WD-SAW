<?php

use Illuminate\Database\Seeder;

class UnigeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */

  //TODO acronym -> nome scuole di appartenenza
  public $ambiti = '
  {
    "ambiti": [
    {
        "name": "Giurisprudenza",
        "acronym": "Scuola di scienze sociali",
        "background_color": "#0061A0",
        "text_color": "#FFF"
      },
      {
        "name": "Scienze MFN",
        "acronym": "Scienze matematiche, fisiche e naturali",
        "background_color": "#007C58",
        "text_color": "#FFF",
        "departments" : [
          {
            "code": "DIBRIS",
            "name": "Dipartimento di Informatica, Bioingegneria, Robotica e Ingegneria dei Sistemi"
          },
          {
            "code": "DIFI",
            "name": "Dipartimento di Fisica"
          }
        ]
      },
      {
        "name": "Scienze Politiche",
        "acronym": "Scuola di scienze sociali",
        "background_color": "#00A7B5",
        "text_color": "#FFF"
      },
      {
        "name": "Lingue e letterature straniere",
        "acronym": "Scuola di scienze umanistiche",
        "background_color": "#A4BCC2",
        "text_color": "#000"
      },
      {
        "name": "Lettere e Filosofia",
        "acronym": "Scuola di scienze umanistiche",
        "background_color": "#B79A81",
        "text_color": "#000"
      },
      {
        "name": "Economia",
        "acronym": "Scuola di scienze sociali",
        "background_color": "#F1C400",
        "text_color": "#000"
      },
      {
        "name": "Scienze della architettura",
        "acronym": "Scuola politecnica",
        "background_color": "#F4633A",
        "text_color": "#FFF",
        "departments" : [
          {
            "code": "DAD",
            "name": "Dipartimento di Architettura e Design"
          }
        ]
      },
      {
        "name": "Medicina e chirurgia",
        "acronym": "Scuola di Scienze mediche farmaceutiche",
        "background_color": "#EF3340",
        "text_color": "#FFF"
      },
      {
        "name": "Scienze della formazione",
        "acronym": "Scuola di Scienze sociali",
        "background_color": "#9B3259",
        "text_color": "#FFF"
      },
      {
        "name": "Ingegneria",
        "acronym": "Scuola politecnica",
        "background_color": "#574676",
        "text_color": "#FFF"
      },
      {
        "name": "Farmacia",
        "acronym": "Scuola di Scienze mediche farmaceutiche",
        "background_color": "#E0A4A1",
        "text_color": "#FFF"
      }
    ]
  }
  ';


  public function run()
  {
    $areeJson = json_decode($this->ambiti);
    foreach ($areeJson->ambiti as $area) {
      $areaVar = new \App\Area();
      $areaVar->name = $area->name;
      $areaVar->acronym = $area->acronym;
      $areaVar->background_color = $area->background_color;
      $areaVar->text_color = $area->text_color;
      $areaVar->save();
      if (isset($area->departments)) {
        $dipartimenti = $area->departments;
        foreach ($dipartimenti as $dip) {
          $dipVar = new \App\Department();
          $dipVar->name = $dip->name;
          $dipVar->code = $dip->code;
          $areaVar->departments()->save($dipVar);
        }
      }
    }
  }
}
