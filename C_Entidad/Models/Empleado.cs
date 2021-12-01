using System;
using System.Collections.Generic;

#nullable disable

namespace C_Entidad.Models
{
    public partial class Empleado
    {
        public Empleado()
        {
            Nominas = new HashSet<Nomina>();
            Vacaciones = new HashSet<Vacacione>();
        }

        public int Id { get; set; }
        public string Nombre { get; set; }
        public string Apellido { get; set; }
        public DateTime? FechaNacimiento { get; set; }
        public string Cedula { get; set; }
        public string Direccion { get; set; }
        public string Telefono { get; set; }
        public string PuestoTrabajo { get; set; }
        public string Correo { get; set; }
        public DateTime? FechaIngreso { get; set; }
        public int? DiasVacaciones { get; set; }

        public virtual ICollection<Nomina> Nominas { get; set; }
        public virtual ICollection<Vacacione> Vacaciones { get; set; }
    }
}
