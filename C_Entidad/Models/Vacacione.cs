using System;
using System.Collections.Generic;

#nullable disable

namespace C_Entidad.Models
{
    public partial class Vacacione
    {
        public int Id { get; set; }
        public int? IdEmpleado { get; set; }
        public DateTime? FechaInicio { get; set; }
        public DateTime? FechaFinal { get; set; }
        public int? Estado { get; set; }

        public virtual Empleado IdEmpleadoNavigation { get; set; }
    }
}
