<?php 

namespace app\models;

use DateTimeImmutable;

class Player {

    private int $id;
    private string $name;
    private string $birthDate;
    private ?string $nationality;
    private ?float $height;
    private ?float $weight;
    private ?string $dominantFoot;
    private ?string $position;
    private ?string $team;
    private ?string $image;
    private DateTimeImmutable $created_at;

}
