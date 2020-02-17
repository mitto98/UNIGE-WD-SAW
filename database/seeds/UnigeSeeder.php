<?php

use Illuminate\Database\Seeder;

class UnigeSeeder extends Seeder
{
    public $ambiti = '
{
  "ambiti": [
    {
      "name": "Architettura e design",
      "background_color": "#F4633A",
      "text_color": "#FFF",
      "courses": [
        {
          "name": "Scienze dell\'Archetettura",
          "id": 8694
        },
        {
          "name": "Design del Prodotto e della Nautica",
          "id": 9274
        },
        {
          "name": "Design del prodotto e dell\'evento",
          "id": 9007
        }
      ]
    },
    {
      "name": "Economia",
      "background_color": "#F1C400",
      "text_color": "#000",
      "courses": [
        {
          "id": 8697,
          "name": "Economia aziendale"
        },
        {
          "id": 8698,
          "name": "Economia delle aziende marittime, della logistica e dei trasporti"
        },
        {
          "id": 8699,
          "name": "Economia e commercio"
        },
        {
          "id": 9912,
          "name": "Economia del turismo"
        }
      ]
    },
    {
      "name": "Giurisprudenza",
      "background_color": "#0061A0",
      "text_color": "#FFF",
      "courses": [
        {
          "name": "Servizi legati all\'impresa e alla PA",
          "id": 10842
        },
        {
          "name": "Servizio sociale",
          "id": 8710
        }
      ]
    },
    {
      "name": "Ingegneria",
      "background_color": "#574676",
      "text_color": "#FFF",
      "courses": [
        {
          "name": "Ingegneria biomedica",
          "id": 8713
        },
        {
          "name": "Ingegneria chimica e di processo",
          "id": 10375
        },
        {
          "name": "Ingegneria civile e ambientale",
          "id": 8715
        },
        {
          "name": "Ingegneria elettrica",
          "id": 8716
        },
        {
          "name": "Ingegneria elettronica e dell\'informazione",
          "id": 9273
        },
        {
          "name": "Ingegneria gestionale",
          "id": 10716
        },
        {
          "name": "Ingegneria informatica",
          "id": 8719
        },
        {
          "name": "Ingegneria meccanica",
          "id": 8720
        },
        {
          "name": "Ingegneria nautica",
          "id": 8721
        },
        {
          "name": "Ingegneria navale",
          "id": 8722
        }
      ]
    },
    {
      "name": "Lettere e Filosofia",
      "background_color": "#B79A81",
      "text_color": "#000",
      "courses": [
        {
          "name": "Conservazione dei beni culturali",
          "id": 8453
        },
        {
          "name": "Filosofia",
          "id": 8455
        },
        {
          "name": "Lettere",
          "id": 8457
        },
        {
          "name": "Storia",
          "id": 8459
        }
      ]
    },
    {
      "name": "Lingue e letterature straniere",
      "background_color": "#A4BCC2",
      "text_color": "#000",
      "courses": [
        {
          "name": "Lingue e culture moderne",
          "id": 8740
        },
        {
          "name": "Teorie e tecniche della mediazione interlinguistica",
          "id": 8741
        }
      ]
    },
    {
      "name": "Medicina e chirurgia",
      "background_color": "#EF3340",
      "text_color": "#FFF",
      "courses": [
        {
          "name": "Biotecnologie",
          "id": 8756
        },
        {
          "name": "Dietistica",
          "id": 9288
        },
        {
          "name": "Educazione professionale",
          "id": 9280
        },
        {
          "name": "Fisioterapia",
          "id": 9281
        },
        {
          "name": "Igiene dentale",
          "id": 9289
        },
        {
          "name": "Infermieristica",
          "id": 9276
        },
        {
          "name": "Infermieristica pediatrica",
          "id": 9277
        },
        {
          "name": "Logopedia",
          "id": 9282
        },
        {
          "name": "Ortottica ed assistenza oftalmologica",
          "id": 9283
        },
        {
          "name": "Ostetricia",
          "id": 9278
        },
        {
          "name": "Podologia",
          "id": 9284
        },
        {
          "name": "Scienze motorie, sport e salute",
          "id": 8744
        },
        {
          "name": "Tecnica della riabilitazione psichiatrica",
          "id": 9286
        }
      ]
    },
    {
      "name": "Scienze della formazione",
      "background_color": "#9B3259",
      "text_color": "#FFF",
      "curses": [
        {
          "name": "Scienze dell\'educazione e della formazione",
          "id": 10841
        },
        {
          "name": "Scienza della comunicazione",
          "id": 8752
        },
        {
          "name": "Scienze e tecniche psicologiche",
          "id": 8751
        }
      ]
    },
    {
      "name": "Scienze MFN",
      "acronym": "Scienze matematiche, fisiche e naturali",
      "background_color": "#007C58",
      "text_color": "#FFF",
      "courses": [
        {
          "name": "Informatica",
          "id": 8759
        },
        {
          "name": "Fisica",
          "id": 8758
        },
        {
          "name": "Chimica e tecnologie chimiche",
          "id": 8757
        },
        {
          "name": "Matematica",
          "id": 8760
        },
        {
          "name": "Scienza dei materiali",
          "id": 8765
        },
        {
          "name": "Scienze e ambienti naturali",
          "id": 9916
        },
        {
          "name": "Scienze biologiche",
          "id": 8762
        },
        {
          "name": "Scienze geologiche",
          "id": 8763
        },
        {
          "name": "Statistica matematica e trattamento dei dati",
          "id": 8766
        }
      ]
    },
    {
      "name": "Scienze Politiche",
      "background_color": "#00A7B5",
      "text_color": "#FFF",
      "courses": [
        {
          "name": "Scienze Internazionali e Diplomatiche",
          "id": 8768
        },
        {
          "name": "Scienze Polotiche e dell\'Amministrazione",
          "id": 8776
        }
      ]
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
            $areaVar->background_color = $area->background_color;
            $areaVar->text_color = $area->text_color;
            $areaVar->save();
            if (isset($area->courses)) {
                $corsi = $area->courses;
                foreach ($corsi as $cor) {
                    $corVar = new \App\Course();
                    $corVar->id = $cor->id;
                    $corVar->name = $cor->name;
                    $areaVar->courses()->save($corVar);
                }
            }
        }


    }
}
