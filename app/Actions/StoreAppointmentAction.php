<?php

namespace App\Actions;

use App\Models\Appointment;
use Illuminate\Support\Str;

class StoreAppointmentAction
{
    /**
     * Exécute l'enregistrement du rendez-vous en mode démo contrôlé.
     */
    public function execute(array $data, ?string $ipAddress = null): Appointment
    {
        // Génération d'une référence clinique unique
        $referenceCode = 'SC-26-' . strtoupper(Str::random(5));

        // Formatage de la notification de test (capturée localement sans envoi externe)
        $treatmentLabels = [
            'soins_generaux' => 'Soins généraux & conservateurs',
            'detartrage' => 'Détartrage & aéropolissage prophylactique',
            'blanchiment' => 'Blanchiment dentaire haute définition',
            'orthodontie' => 'Orthodontie & aligneurs invisibles 3D',
            'urgence' => 'Urgence dentaire prioritaire',
        ];

        $treatmentName = $treatmentLabels[$data['treatment']] ?? $data['treatment'];
        $slot = $data['preferred_slot'] ?? 'Indifférent';
        $date = !empty($data['preferred_date']) ? $data['preferred_date'] : 'Dès que possible';

        $notificationPreview = [
            'type' => 'SIMULATED_SMS_WHATSAPP',
            'recipient' => $data['phone'],
            'recipient_name' => $data['name'],
            'sender' => 'Sourire Clinic Casa',
            'timestamp' => now()->format('d/m/Y H:i:s'),
            'message' => "Bonjour {$data['name']}, votre demande de consultation pour « {$treatmentName} » (Créneau: {$slot}, Date: {$date}) est bien enregistrée sous la référence #{$referenceCode}. Notre secrétariat médical à Casablanca vous recontactera sous 2h ouvrées.",
            'internal_note' => 'Notification test capturée dans le cadre de la démonstration commerciale Sourire Clinic. Aucun SMS payant envoyé.'
        ];

        return Appointment::create([
            'reference_code' => $referenceCode,
            'name' => trim($data['name']),
            'phone' => trim($data['phone']),
            'email' => !empty($data['email']) ? trim($data['email']) : null,
            'treatment' => $treatmentName,
            'preferred_slot' => $slot,
            'preferred_date' => $data['preferred_date'] ?? null,
            'message' => !empty($data['message']) ? trim($data['message']) : null,
            'ip_address' => $ipAddress,
            'notification_preview' => json_encode($notificationPreview, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
            'status' => 'enregistré_démo',
        ]);
    }
}
