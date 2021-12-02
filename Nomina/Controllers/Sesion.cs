using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Nomina.Controllers
{
    public class Sesion : Controller
    {
        // GET: Sesion
        public ActionResult Login()
        {
            return View();
        }

        // GET: Sesion/Details/5
        public ActionResult Details(int id)
        {
            return View();
        }

        // GET: Sesion/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: Sesion/Create
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(IFormCollection collection)
        {
            try
            {
                return RedirectToAction(nameof(Login));
            }
            catch
            {
                return View();
            }
        }

        // GET: Sesion/Edit/5
        public ActionResult Edit(int id)
        {
            return View();
        }

        // POST: Sesion/Edit/5
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit(int id, IFormCollection collection)
        {
            try
            {
                return RedirectToAction(nameof(Login));
            }
            catch
            {
                return View();
            }
        }

        // GET: Sesion/Delete/5
        public ActionResult Delete(int id)
        {
            return View();
        }

        // POST: Sesion/Delete/5
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Delete(int id, IFormCollection collection)
        {
            try
            {
                return RedirectToAction(nameof(Login));
            }
            catch
            {
                return View();
            }
        }
    }
}
