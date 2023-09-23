<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketTypes extends Model
{
        //On event Types
        public const IS_ADULT = 'adult';
        public const IS_KID = 'kid';
    
        //Pre event types
        public const IS_PRESALE_ADULT = 'ps_adult'; //12,000            DONE
        public const IS_PRESALE_KID = 'ps_kid'; //10,000                DONE
        public const IS_PRESALE_VALLEY_ADULT = 'ps_v_adult'; //3,000    DONE
        public const IS_PRESALE_VALLEY_KID = 'ps_v_kid'; //3,000        DONE     
    
        public const IS_COURTESY_NENAS = 'ct_nenas'; //20,000           DONE
        public const IS_COURTESY_ADULT = 'ct_adult'; //12,000           DONE
        public const IS_COURTESY_ADULT_SECOND_BATCH = 'ct_adult_2'; //12,000           DONE
        public const IS_COURTESY_KID = 'ct_kid'; //10,000               DONE
        public const IS_COURTESY_CAST = 'ct_cast'; //9,000              DONE
    
    use HasFactory;
}
