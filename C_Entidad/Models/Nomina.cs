using System;
using System.Collections.Generic;

#nullable disable

namespace C_Entidad.Models
{
    public partial class Nomina
    {
        public int Id { get; set; }
        public int? IdEmpleado { get; set; }
        public int? Sueldo { get; set; }
        public int? Afp { get; set; }
        public int? Ars { get; set; }
        public int? Isr { get; set; }
        public int? Cafeteria { get; set; }
        public int? Cooperativa { get; set; }
        public int? Comision { get; set; }
        public int? SueldoNeto { get; set; }

        public virtual Empleado IdEmpleadoNavigation { get; set; }
    }
}
