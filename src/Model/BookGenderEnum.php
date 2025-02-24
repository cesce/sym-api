<?php

namespace App\Model;

enum BookGenderEnum: string
{
    case Novel = 'Novel';
    case ScienceFiction = 'Science Fiction';
    case Fantasy = 'Fantasy';
    case Mystery = 'Mystery';
    case Horror = 'Horror';
    case Romance = 'Romance';
    case Thriller = 'Thriller';
    case Western = 'Western';
    case Dystopian = 'Dystopian';
    case Memoir = 'Memoir';
    case Biography = 'Biography';
    case Play = 'Play';
    case Poetry = 'Poetry';
    case History = 'History';
    case Science = 'Science';
    case Math = 'Math';
    case Programming = 'Programming';
    case Art = 'Art';
    case CookBook = 'Cook Book';
    case SelfHelp = 'Self Help';
    case Health = 'Health';
    case Travel = 'Travel';
    case Guide = 'Guide';
    case Children = 'Children';
    case YoungAdult = 'Young Adult';
    case Adult = 'Adult';
    case Other = 'Other';
}
