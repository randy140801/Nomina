using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

#nullable disable

namespace C_Entidad.Models
{
    public partial class MantenimientosContext : DbContext
    {
        public MantenimientosContext()
        {
        }

        public MantenimientosContext(DbContextOptions<MantenimientosContext> options)
            : base(options)
        {
        }

        public virtual DbSet<Admin> Admins { get; set; }
        public virtual DbSet<Empleado> Empleados { get; set; }
        public virtual DbSet<Nomina> Nominas { get; set; }
        public virtual DbSet<Vacacione> Vacaciones { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
                optionsBuilder.UseSqlServer("Server=.;Database=Mantenimientos;Trusted_Connection=True;");
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.HasAnnotation("Relational:Collation", "SQL_Latin1_General_CP1_CI_AS");

            modelBuilder.Entity<Admin>(entity =>
            {
                entity.ToTable("Admin");

                entity.Property(e => e.Cedula)
                    .HasMaxLength(15)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Empleado>(entity =>
            {
                entity.ToTable("Empleado");

                entity.HasIndex(e => e.Cedula, "UQ__Empleado__415B7BE558E3BED1")
                    .IsUnique();

                entity.Property(e => e.Apellido)
                    .HasMaxLength(200)
                    .IsUnicode(false);

                entity.Property(e => e.Cedula)
                    .HasMaxLength(15)
                    .IsUnicode(false)
                    .HasColumnName("cedula");

                entity.Property(e => e.Correo)
                    .HasMaxLength(200)
                    .IsUnicode(false);

                entity.Property(e => e.DiasVacaciones).HasColumnName("Dias_Vacaciones");

                entity.Property(e => e.Direccion)
                    .HasMaxLength(255)
                    .IsUnicode(false);

                entity.Property(e => e.FechaIngreso)
                    .HasColumnType("date")
                    .HasColumnName("Fecha_Ingreso");

                entity.Property(e => e.FechaNacimiento)
                    .HasColumnType("date")
                    .HasColumnName("Fecha_Nacimiento");

                entity.Property(e => e.Nombre)
                    .HasMaxLength(100)
                    .IsUnicode(false);

                entity.Property(e => e.PuestoTrabajo)
                    .HasMaxLength(255)
                    .IsUnicode(false)
                    .HasColumnName("Puesto_Trabajo");

                entity.Property(e => e.Telefono)
                    .HasMaxLength(15)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Nomina>(entity =>
            {
                entity.ToTable("Nomina");

                entity.Property(e => e.Afp).HasColumnName("AFP");

                entity.Property(e => e.Ars).HasColumnName("ARS");

                entity.Property(e => e.IdEmpleado).HasColumnName("Id_Empleado");

                entity.Property(e => e.Isr).HasColumnName("ISR");

                entity.Property(e => e.SueldoNeto).HasColumnName("Sueldo_neto");

                entity.HasOne(d => d.IdEmpleadoNavigation)
                    .WithMany(p => p.Nominas)
                    .HasForeignKey(d => d.IdEmpleado)
                    .HasConstraintName("FK__Nomina__Sueldo_n__29572725");
            });

            modelBuilder.Entity<Vacacione>(entity =>
            {
                entity.Property(e => e.FechaFinal)
                    .HasColumnType("date")
                    .HasColumnName("Fecha_final");

                entity.Property(e => e.FechaInicio)
                    .HasColumnType("date")
                    .HasColumnName("Fecha_inicio");

                entity.Property(e => e.IdEmpleado).HasColumnName("Id_Empleado");

                entity.HasOne(d => d.IdEmpleadoNavigation)
                    .WithMany(p => p.Vacaciones)
                    .HasForeignKey(d => d.IdEmpleado)
                    .HasConstraintName("FK__Vacacione__Estad__2C3393D0");
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
