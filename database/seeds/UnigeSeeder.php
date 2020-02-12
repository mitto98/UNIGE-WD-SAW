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
      "text_color": "#FFF",
      "departments": [
        {
          "code": "DIGI",
          "name": "Dipartimento di Giurisprudenza",
          "courses": [
            {
              "name": "Corso di Laurea magistrale in Giurisprudenza",
              "id": 7995
            },
            {
              "name": "Corso di Laurea triennale in Servizio Sociale",
              "id": 8710
            }
          ]
        }
      ]
    },
    {
      "name": "Scienze MFN",
      "acronym": "Scienze matematiche, fisiche e naturali",
      "background_color": "#007C58",
      "text_color": "#FFF",
      "departments": [
        {
          "code": "DIBRIS",
          "name": "Dipartimento di Informatica, Bioingegneria, Robotica e Ingegneria dei Sistemi",
          "courses": [
            {
              "name": "Informatica",
              "id": 8759
            },
            {
              "name": "Ingeneria Biomedica",
              "id": 8713
            },
            {
              "name": "Ingegneria Informatica",
              "id": 8719
            }
          ]
        },
        {
          "code": "DIFI",
          "name": "Dipartimento di Fisica",
          "courses": [
            {
              "name": "Fisica",
              "id": 8758
            },
            {
              "name": "Scienza dei Materiali",
              "id": 8765
            }
          ]
        }
      ]
    },
    {
      "name": "Scienze Politiche",
      "acronym": "Scuola di scienze sociali",
      "background_color": "#00A7B5",
      "text_color": "#FFF",
      "departments": [
        {
          "code": "DISPO",
          "name": "Dipartimento di Scienze Politiche",
          "courses": [
            {
              "name": "Scienze Internazionali e Diplomatiche",
              "id": 8768
            },
            {
              "name": "Scienze del Turismo",
              "id": 9912
            },
            {
              "name": "Scienze Polotiche e dell\'Amministrazione",
              "id": 8776
            }
          ]
        }
      ]
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
      "departments": [
        {
          "code": "DAD",
          "name": "Dipartimento di Architettura e Design",
          "courses": [
            {
              "name": "Scienze dell\'Archetitettura",
              "id": 8694
            },
            {
              "name": "Design del Prodotto e della Nautica",
              "id": 9274
            },
            {
              "name": "Architettura",
              "id": 9915
            }
          ]
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
          if(isset($dip->courses)) {
            $corsi = $dip->courses;
            foreach ($corsi as $cor) {
              $corVar = new \App\Course();
              $corVar->name = $cor->name;
              $dipVar->courses()->save($corVar);
            }
          }
        }
      }
    }
  }
}
