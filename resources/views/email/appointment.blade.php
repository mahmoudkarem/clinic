Dear {{ $emailData['name'] }},
<p>Thank you for booking your appointment with Medical Center.</p>
<p>The details of your appointment are below:</p>
Time & Date: {{ $emailData['time'] }}, {{ $emailData['date'] }}
with Dr. {{ $emailData['doctor_name'] }}

<p>Location: Boston, MA, USA</p>
<p>Contact: 8573339055</p>