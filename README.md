# XML-project
Уеб приложение с база данни на лекари и пациенти и техните прегледи, диагнози и рецепти.
Лекарите(Aerzte_TBL) и пациентие(Patiente_TBL) са самостоятелни таблици.
Прегледите(Untersuchungen_TBL) е релационната таблица между пациентите и лекарите. Взима ID-то на лекаря(AID) и на пациента(PID).
Диагнозата(Diagnose_TBL) идва от прегледа(взима ID-то на прегледа (Unt_ID)).
Рецептата(Rezepte_TBL) идва от диагнозата(взима ID-то на диагнозата(DID)).
На браузъра да се показват двете таблици на лекарите и пациентите. Да има възможност за редактиране и изтриване на редове на всяка таблица. От лекаря и пациента да излиза справка за преглед. От преглед излиа справка за диагноза и от диагноза излиза справка за рецепти.
