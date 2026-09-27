<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with demo data.
     */
    public function run(): void
    {
        Appointment::create([
            'reference_code' => 'SC-26-DEMO1',
            'name' => 'Kenza Berrada',
            'phone' => '+212 6 61 45 88 90',
            'email' => 'kenza.berrada@example.ma',
            'treatment' => 'Orthodontie & aligneurs invisibles 3D',
            'preferred_slot' => 'matin',
            'preferred_date' => '2026-09-24',
            'message' => 'Souhaite un premier scan numérique 3D pour bilan d\'alignement.',
            'ip_address' => '127.0.0.1',
            'notification_preview' => json_encode([
                'type' => 'SIMULATED_SMS_WHATSAPP',
                'recipient' => '+212 6 61 45 88 90',
                'recipient_name' => 'Kenza Berrada',
                'sender' => 'Sourire Clinic Casa',
                'timestamp' => '19/09/2026 10:15:00',
                'message' => "Bonjour Kenza Berrada, votre demande de consultation pour « Orthodontie & aligneurs invisibles 3D » est bien enregistrée sous la référence #SC-26-DEMO1. Notre secrétariat médical à Casablanca vous recontactera sous 2h ouvrées.",
                'internal_note' => 'Notification test capturée dans le cadre de la démonstration commerciale Sourire Clinic.'
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
            'status' => 'enregistré_démo',
        ]);

        Appointment::create([
            'reference_code' => 'SC-26-DEMO2',
            'name' => 'Driss Alami',
            'phone' => '+212 6 63 12 77 44',
            'email' => 'driss.alami@example.ma',
            'treatment' => 'Blanchiment dentaire haute définition',
            'preferred_slot' => 'apres_midi',
            'preferred_date' => '2026-09-26',
            'message' => 'Rendez-vous avant un événement familial.',
            'ip_address' => '127.0.0.1',
            'notification_preview' => json_encode([
                'type' => 'SIMULATED_SMS_WHATSAPP',
                'recipient' => '+212 6 63 12 77 44',
                'recipient_name' => 'Driss Alami',
                'sender' => 'Sourire Clinic Casa',
                'timestamp' => '19/09/2026 11:00:00',
                'message' => "Bonjour Driss Alami, votre demande de consultation pour « Blanchiment dentaire haute définition » est bien enregistrée sous la référence #SC-26-DEMO2. Notre secrétariat médical à Casablanca vous recontactera sous 2h ouvrées.",
                'internal_note' => 'Notification test capturée dans le cadre de la démonstration commerciale Sourire Clinic.'
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
            'status' => 'enregistré_démo',
        ]);
    }
}
