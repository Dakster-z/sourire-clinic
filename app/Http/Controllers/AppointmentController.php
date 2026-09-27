<?php

namespace App\Http\Controllers;

use App\Actions\StoreAppointmentAction;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Affiche la page d'accueil avec toutes les sections et le Hero 3D.
     */
    public function index(): View
    {
        $recentAppointmentsCount = Appointment::count();

        // 5 prestations types demandées par le brief
        $treatments = [
            [
                'id' => 'soins_generaux',
                'name' => 'Soins Généraux & Conservateurs',
                'category' => 'Dentisterie Fondamentale',
                'tag' => 'Sans douleur',
                'tag_color' => 'teal',
                'summary' => 'Traitement micro-invasif des caries, composites esthétiques biomimétiques et bio-scellements protecteurs sous champ opératoire.',
                'duration' => '30 à 45 min',
                'tech' => 'Anesthésie informatisée SleeperOne, composites nanohybrides teintés sur-mesure.',
                'indications' => ['Sensibilité dentaire', 'Caries débutantes ou profondes', "Remplacement d'amalgames métalliques"],
                'steps' => [
                    'Diagnostic par caméra optique haute résolution',
                    'Élimination sélective des tissus lésés avec préservation maximale de l\'émail',
                    'Reconstitution anatomique en résine composite stratifiée'
                ],
                'pricing_hint' => 'À partir de 450 DH (devis personnalisé selon étendue)'
            ],
            [
                'id' => 'detartrage',
                'name' => 'Détartrage & Aéropolissage Prophylactique',
                'category' => 'Hygiène & Prévention',
                'tag' => 'Protocole Douceur GBT',
                'tag_color' => 'teal',
                'summary' => 'Nettoyage guidé par révélateur de plaque (Guided Biofilm Therapy), ultrasons piézoélectriques doux et aéropolissage à la glycine micro-fine.',
                'duration' => '40 min',
                'tech' => 'Système suisse EMS Airflow Prophylaxis Master, poudre d’érythritol non abrasive.',
                'indications' => ['Saignements gingivaux', 'Taches de thé / café / tabac', 'Maintenance semestrielle'],
                'steps' => [
                    'Révélation visuelle de la plaque bactérienne',
                    'Aéropolissage sub et supra-gingival indolore',
                    'Finitions aux micro-ultrasons et fluorisation protectrice'
                ],
                'pricing_hint' => 'Forfait prévention 600 DH'
            ],
            [
                'id' => 'blanchiment',
                'name' => 'Blanchiment Dentaire Haute Définition',
                'category' => 'Esthétique Dentaire',
                'tag' => 'Jusqu\'à +7 teintes',
                'tag_color' => 'coral',
                'summary' => 'Éclaircissement médical au peroxyde d’hydrogène potentialisé par lumière froide LED. Zéro agression de l\'émail et sensibilité contrôlée.',
                'duration' => '60 à 75 min',
                'tech' => 'Lampe d’activation LED Philips Zoom! WhiteSpeed, désensibilisant au phosphate de calcium.',
                'indications' => ['Jaunissement de l\'émail', 'Événements importants (mariages, tournages)', 'Éclat terni'],
                'steps' => [
                    'Bilan préliminaire et nettoyage de surface',
                    'Protection gingivale par digue liquide polymérisée',
                    '3 cycles de 15 minutes d\'activation photodynamique'
                ],
                'pricing_hint' => 'Séance complète au fauteuil 2 500 DH'
            ],
            [
                'id' => 'orthodontie',
                'name' => 'Orthodontie & Aligneurs Invisibles 3D',
                'category' => 'Alignement & Occlusion',
                'tag' => '100% Discret',
                'tag_color' => 'teal',
                'summary' => 'Gouttières transparentes amovibles de dernière génération. Simulation numérique 3D avant même le démarrage du traitement.',
                'duration' => 'Suivi mensuel de 15 min',
                'tech' => 'Empreinte optique 3D sans pâte, modélisation prédictive du sourire final.',
                'indications' => ['Chevauchements dentaires', 'Espacements (diastèmes)', 'Correction de l\'occlusion adulte'],
                'steps' => [
                    'Scan intra-oral 3D complet de vos mâchoires en 3 minutes',
                    'Présentation de la vidéo de simulation de votre futur sourire',
                    'Remise des séries d\'aligneurs thermoformés transparents'
                ],
                'pricing_hint' => 'Bilan 3D offert — Traitement échelonné'
            ],
            [
                'id' => 'urgence',
                'name' => 'Urgences Dentaires Casablanca',
                'category' => 'Prise en Charge Immédiate',
                'tag' => 'Priorité Douleur',
                'tag_color' => 'coral',
                'summary' => 'Soulagement immédiat des rages de dents, pulpites aiguës, fractures dentaires, desmodontites ou couronnes décollées le jour même.',
                'duration' => 'Prise en charge sans délai',
                'tech' => 'Radiographie numérique panoramique instantanée, sédation consciente au besoin.',
                'indications' => ['Douleur pulsatile insomniante', 'Choc ou dent cassée', 'Gonflement ou abcès'],
                'steps' => [
                    'Anamnèse rapide et anesthésie antalgique ciblée prioritaire',
                    'Radiographie numérique haute précision pour diagnostic éclair',
                    'Geste d\'urgence conservateur pour stopper net la souffrance'
                ],
                'pricing_hint' => 'Tarif conventionné selon acte d\'urgence'
            ],
        ];

        return view('welcome', compact('treatments', 'recentAppointmentsCount'));
    }

    /**
     * Traite et enregistre la demande de RDV (avec persistance SQLite & honeypot).
     */
    public function store(StoreAppointmentRequest $request, StoreAppointmentAction $action): JsonResponse|RedirectResponse
    {
        $appointment = $action->execute($request->validated(), $request->ip());

        $notificationData = json_decode($appointment->notification_preview, true);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Votre demande de rendez-vous a été enregistrée avec succès.',
                'appointment' => [
                    'reference' => $appointment->reference_code,
                    'name' => $appointment->name,
                    'phone' => $appointment->phone,
                    'treatment' => $appointment->treatment,
                    'slot' => $appointment->preferred_slot,
                    'date' => $appointment->preferred_date ?? 'Dès que possible',
                    'created_at' => $appointment->created_at->format('d/m/Y à H:i'),
                ],
                'notification_preview' => $notificationData,
            ], 201);
        }

        return redirect()->to('/#rdv-section')
            ->with('success_appointment', [
                'reference' => $appointment->reference_code,
                'name' => $appointment->name,
                'phone' => $appointment->phone,
                'treatment' => $appointment->treatment,
                'notification' => $notificationData,
            ]);
    }

    /**
     * API Démo pour afficher les rendez-vous enregistrés dans SQLite.
     * Idéal lors du rendez-vous commercial pour montrer le fonctionnement concret.
     */
    public function apiAppointments(): JsonResponse
    {
        $appointments = Appointment::latest()->limit(15)->get();

        return response()->json([
            'count' => $appointments->count(),
            'appointments' => $appointments->map(function ($item) {
                return [
                    'id' => $item->id,
                    'reference' => $item->reference_code,
                    'name' => $item->name,
                    'phone' => $item->phone,
                    'email' => $item->email,
                    'treatment' => $item->treatment,
                    'slot' => $item->preferred_slot,
                    'date' => $item->preferred_date,
                    'message' => $item->message,
                    'status' => $item->status,
                    'created_at' => $item->created_at->format('d/m/Y H:i'),
                    'notification' => json_decode($item->notification_preview, true),
                ];
            }),
        ]);
    }

    /**
     * Réinitialisation rapide pour les présentations commerciales.
     */
    public function resetDemo(): JsonResponse
    {
        Appointment::truncate();

        return response()->json([
            'success' => true,
            'message' => 'Base de démonstration réinitialisée.',
        ]);
    }
}
