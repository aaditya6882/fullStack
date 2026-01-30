function toggleNav() {
  const nav = document.getElementById("nav-menu");
  if (nav) {
    nav.classList.toggle("active");
  }
}

async function updateTime() {
  const doctorEl = document.getElementById("doctor");
  const dateEl = document.querySelector("input[name='date']");
  const availEl = document.getElementById("availability");

  if (!doctorEl || !dateEl || !availEl) return;

  const doctor = doctorEl.value;
  const date = dateEl.value;

  if (!doctor || !date) {
    availEl.textContent = "Select doctor and date to see availability.";
    return;
  }

  try {
    const res = await fetch(
      `public/user/controller/appointmentController.php?action=availability&doctor=${encodeURIComponent(doctor)}&date=${encodeURIComponent(date)}`,
    );
    const data = await res.json();
    const booked = data.booked || [];
    if (booked.length === 0) {
      availEl.textContent =
        "No bookings found. You should be able to book any time.";
      return;
    }
    const list = booked
      .map((b) => `${b.start_time} - ${b.end_time}`)
      .join(", ");
    availEl.textContent = `Booked: ${list}`;
  } catch (e) {
    availEl.textContent = "Failed to load availability.";
  }
}
document.addEventListener("DOMContentLoaded", () => {
  const dateEl = document.querySelector("input[name='date']");
  if (dateEl) {
    dateEl.addEventListener("change", updateTime);
  }
  const doctorEl = document.getElementById("doctor");
  if (doctorEl) {
    doctorEl.addEventListener("change", updateTime);
  }
});
