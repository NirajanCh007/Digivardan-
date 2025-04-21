<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AppointmentBooked extends Notification implements ShouldQueue
{
    use Queueable;

    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via(object $notifiable): array
    {
        return ['database']; // Add 'mail' or 'broadcast' if needed
    }

    public function toDatabase($notifiable)
    {
        $patient = $this->appointment->patient->name ?? 'Patient';
        $doctor = $this->appointment->doctor->name ?? 'Doctor';
        $date = $this->appointment->appointment_date;
        $time = $this->appointment->appointment_time;

        if ($notifiable->id === $this->appointment->doctor_id) {
            // Notification for the Doctor
            return [
                'title' => 'New Appointment Booked',
                'message' => "You have a new appointment with $patient on $date at $time.",
                'appointment_id' => $this->appointment->id,
                'type' => 'doctor',
            ];
        } elseif ($notifiable->id === $this->appointment->patient_id) {
            // Notification for the Patient
            return [
                'title' => 'Appointment Confirmed',
                'message' => "Your appointment with Dr. $doctor is confirmed for $date at $time.",
                'appointment_id' => $this->appointment->id,
                'type' => 'patient',
            ];
        }

        return [
            'title' => 'Appointment Booked',
            'message' => 'An appointment has been booked.',
            'appointment_id' => $this->appointment->id,
            'type' => 'general',
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Appointment Booked')
            ->line('An appointment has been successfully booked.')
            ->action('View Appointment', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'appointment_id' => $this->appointment->id,
        ];
    }
}
