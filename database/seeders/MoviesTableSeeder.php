<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Birdman - o L\'imprevedibile virtù dell\'ignoranza',
                'director' => 'Alejandro G. Iñárritu',
                'release_year' => 2014,
                'rating' => 8.0,
                'description' => 'Riggan Thomson, un attore famoso per aver interpretato un supereroe iconico, tenta di rilanciare la propria carriera attraverso una produzione teatrale ambiziosa. Combattendo contro le sue insicurezze, la critica spietata e una voce interiore ossessiva, Riggan cerca di riconquistare il rispetto di pubblico e famiglia. Un viaggio tra realtà e follia, tra ego e arte.',
                'genre_id' => 3,
                'poster_url' => 'movies/birdmanPoster.jpg',
            ],
            [
                'title' => 'Martin Eden',
                'director' => 'Pietro Marcello',
                'release_year' => 2019,
                'rating' => 7.1,
                'description' => 'Martin, un marinaio autodidatta, si innamora di una giovane aristocratica e inizia a studiare per elevarsi socialmente. Il suo talento nella scrittura lo porta al successo, ma il prezzo è l’alienazione dalla società e da sé stesso. Una potente riflessione sulla lotta di classe, l’identità e la disillusione politica.',
                'genre_id' => 3,
                'poster_url' => 'movies/martinEdenPoster.jpg',
            ],
            [
                'title' => 'I predatori',
                'director' => 'Pietro Castellitto',
                'release_year' => 2020,
                'rating' => 6.5,
                'description' => 'Due famiglie romane, apparentemente incompatibili, si trovano coinvolte in un assurdo intreccio di eventi. Il film alterna ironia e tragedia in una critica feroce alla società italiana contemporanea. Sotto la superficie comica si nascondono rabbia, solitudine e disincanto.',
                'genre_id' => 2,
                'poster_url' => 'movies/iPredatoriPoster.jpg',
            ],
            [
                'title' => 'Loro Chi?',
                'director' => 'Francesco Miccichè, Fabio Bonifacci',
                'release_year' => 2015,
                'rating' => 6.2,
                'description' => 'David è un uomo comune che viene truffato da un abile manipolatore. In cerca di vendetta, finisce per essere trascinato in un mondo fatto di inganni e illusioni. La realtà si confonde con la finzione in un gioco tra vittima e carnefice, pieno di colpi di scena.',
                'genre_id' => 2,
                'poster_url' => 'movies/loroChiPoster.jpg',
            ],
            [
                'title' => 'Into the Wild',
                'director' => 'Sean Penn',
                'release_year' => 2007,
                'rating' => 8.1,
                'description' => 'Christopher McCandless abbandona la civiltà e intraprende un viaggio attraverso gli Stati Uniti verso l’Alaska. Spinto da ideali di libertà e rifiuto del materialismo, cerca un senso più profondo della vita. Il viaggio si trasforma in un percorso esistenziale e spirituale, culminando in una tragica solitudine.',
                'genre_id' => 3,
                'poster_url' => 'movies/intoTheWildPoster.jpg',
            ],
            [
                'title' => 'Django Unchained',
                'director' => 'Quentin Tarantino',
                'release_year' => 2012,
                'rating' => 8.4,
                'description' => 'Django, uno schiavo liberato, si allea con un cacciatore di taglie per salvare sua moglie da un crudele proprietario terriero. In un Far West violento e razzista, la vendetta si mescola all’azione esplosiva e al sarcasmo tipico di Tarantino. Una feroce denuncia sociale mascherata da spettacolo.',
                'genre_id' => 14,
                'poster_url' => 'movies/djangoUnchainedPoster.jpg',
            ],
            [
                'title' => 'Arancia meccanica',
                'director' => 'Stanley Kubrick',
                'release_year' => 1971,
                'rating' => 8.3,
                'description' => 'Alex è il capo di una banda di giovani ultra-violenti in un futuro distopico. Dopo l’arresto, viene sottoposto a un esperimento di “rieducazione” psicologica che solleva interrogativi morali profondi. Un film disturbante e visionario che esplora il libero arbitrio, la repressione e la natura del male.',
                'genre_id' => 6,
                'poster_url' => 'movies/aranciaMeccanicaPoster.jpg',
            ],
            [
                'title' => 'Joker',
                'director' => 'Todd Phillips',
                'release_year' => 2019,
                'rating' => 8.4,
                'description' => 'Arthur Fleck è un uomo emarginato che sogna di diventare un comico, ma viene continuamente respinto dalla società. Il suo declino psicologico lo trasforma lentamente nel famigerato Joker. Una parabola cupa sulla malattia mentale, l’abbandono sociale e l’esplosione della violenza urbana.',
                'genre_id' => 6,
                'poster_url' => 'movies/jokerPoster.jpg',
            ],
            [
                'title' => 'The Batman',
                'director' => 'Matt Reeves',
                'release_year' => 2022,
                'rating' => 7.9,
                'description' => 'Un giovane Bruce Wayne affronta i suoi demoni interiori mentre indaga su una serie di omicidi orchestrati dall’Enigmista. Gotham è più oscura che mai, e la verità che emerge scuote le fondamenta della sua identità. Un thriller investigativo dal tono noir e cupamente realistico.',
                'genre_id' => 1,
                'poster_url' => 'movies/theBatmanPoster.jpg',
            ],
            [
                'title' => 'Spiderman into the Spiderverse',
                'director' => 'Bob Persichetti, Peter Ramsey, Rodney Rothman',
                'release_year' => 2018,
                'rating' => 8.4,
                'description' => 'Miles Morales scopre di non essere l’unico Spider-Man e si ritrova coinvolto in un’avventura interdimensionale. Incontra vari eroi simili a lui, ognuno con uno stile unico. Un film animato sorprendente, innovativo e visivamente straordinario, che celebra il potere della diversità.',
                'genre_id' => 9,
                'poster_url' => 'movies/spidermanSpiderversePoster.jpg',
            ],
            [
                'title' => 'Bardo, la cronaca falsa di alcune verità',
                'director' => 'Alejandro G. Iñárritu',
                'release_year' => 2022,
                'rating' => 6.9,
                'description' => 'Un giornalista e documentarista messicano ritorna in patria e affronta un vortice di ricordi, sogni e colpe. Il confine tra realtà e finzione si fa labile, creando un mosaico di immagini potenti e poetiche. Una riflessione esistenziale sull’identità, la memoria e l’arte stessa.',
                'genre_id' => 3,
                'poster_url' => 'movies/bardoPoster.jpg',
            ],
            [
                'title' => 'Everything Everywhere All at Once',
                'director' => 'Daniel Kwan, Daniel Scheinert',
                'release_year' => 2022,
                'rating' => 8.0,
                'description' => 'Evelyn, una donna apparentemente ordinaria, scopre di essere la chiave per salvare il multiverso. Attraverso realtà alternative assurde e commoventi, affronta il caos con forza e umorismo. Un mix di fantascienza, filosofia e comicità che sfida ogni genere e aspettativa.',
                'genre_id' => 4,
                'poster_url' => 'movies/everythingEverywherePoster.jpg',
            ],
            [
                'title' => 'Il gatto con gli stivali 2',
                'director' => 'Joel Crawford',
                'release_year' => 2022,
                'rating' => 7.9,
                'description' => 'Il Gatto scopre di aver consumato otto delle sue nove vite e parte alla ricerca dell’ultima possibilità. Incontrerà vecchi amici e nuovi nemici in un’avventura comica e commovente. Un racconto per tutte le età, ricco di azione, risate e riflessioni sulla paura e il coraggio.',
                'genre_id' => 9,
                'poster_url' => 'movies/gattoConStivali2Poster.jpg',
            ],
            [
                'title' => 'Eyes Wide Shut',
                'director' => 'Stanley Kubrick',
                'release_year' => 1999,
                'rating' => 7.5,
                'description' => 'Dopo una confessione della moglie, un medico entra in un viaggio notturno attraverso riti segreti e desideri repressi. Il confine tra sogno e realtà si dissolve in un’atmosfera carica di tensione erotica e mistero. Kubrick firma un’opera inquietante sull’amore, il tradimento e il desiderio umano.',
                'genre_id' => 8,
                'poster_url' => 'movies/eyesWideShutPoster.jpg',
            ],
            [
                'title' => 'Licorice Pizza',
                'director' => 'Paul Thomas Anderson',
                'release_year' => 2021,
                'rating' => 7.2,
                'description' => 'Nella California degli anni ’70, l’adolescente Gary e l’irrequieta Alana si muovono tra sogni, fallimenti e amori impossibili. Il film segue la loro strana relazione attraverso un caleidoscopio di episodi surreali e nostalgici. Una lettera d’amore al cinema, all’adolescenza e alle occasioni mancate.',
                'genre_id' => 2,
                'poster_url' => 'movies/licoricePizzaPoster.jpg',
            ],
            [
                'title' => 'Sir Gawain e il cavaliere verde',
                'director' => 'David Lowery',
                'release_year' => 2021,
                'rating' => 6.7,
                'description' => 'Sir Gawain, nipote di Re Artù, accetta la sfida del misterioso Cavaliere Verde. Inizia così un viaggio mistico tra creature, illusioni e scelte morali. Un’epica medievale in chiave simbolica e visionaria, che riflette sul coraggio, l’onore e la mortalità.',
                'genre_id' => 13,
                'poster_url' => 'movies/sirGawainPoster.jpg',
            ],
            [
                'title' => 'Ex machina',
                'director' => 'Alex Garland',
                'release_year' => 2014,
                'rating' => 7.7,
                'description' => 'Un giovane programmatore è invitato a testare un’IA in un laboratorio remoto. L’esperimento, apparentemente tecnico, si trasforma in un gioco psicologico tra uomo, macchina e creatore. Un thriller filosofico che esplora i limiti dell’intelligenza artificiale e della coscienza.',
                'genre_id' => 4,
                'poster_url' => 'movies/exMachinaPoster.jpg',
            ],
            [
                'title' => '8 1/2',
                'director' => 'Federico Fellini',
                'release_year' => 1963,
                'rating' => 8.0,
                'description' => 'Guido Anselmi, regista in crisi, cerca ispirazione per il suo prossimo film ma si perde tra sogni, ricordi e illusioni. La realtà si fonde con la fantasia in un flusso onirico tipicamente felliniano. Un capolavoro del cinema moderno sulla creazione artistica e sull’identità.',
                'genre_id' => 2,
                'poster_url' => 'movies/ottoEMezzoPoster.jpg',
            ]
        ];

        foreach ($movies as $movie) {
            $newMovie = new Movie();
            $newMovie->title = $movie['title'];
            $newMovie->director = $movie['director'];
            $newMovie->release_year = $movie['release_year'];
            $newMovie->description = $movie['description'];
            $newMovie->genre_id = $movie['genre_id'];
            if (isset($movie['poster_url'])) {
                $newMovie->poster_url = $movie['poster_url'];
            }
            if (isset($movie['rating'])) {
                $newMovie->rating = $movie['rating'];
            }
            $newMovie->save();
        }
    }
}
