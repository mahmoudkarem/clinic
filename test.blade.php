<p>Date: {{ $prescription->date }}</p>
                    <p>Patient: {{ $prescription->patient->name }}</p>
                    <p>Doctor: {{ $prescription->doctor->name }}</p>
                    <p>Disease: {{ $prescription->disease }}</p>
                    <p>Symptoms: {{ $prescription->symptoms }}</p>
                    <p>Medicine: {{ $prescription->medicine }}</p>
                    <p>Procedure to use medicine: {{ $prescription->procedure }}</p>
                    <p>Feedback: {{ $prescription->feedback }}</p>
                    <p>Signature: {{ $prescription->signature }}</p>