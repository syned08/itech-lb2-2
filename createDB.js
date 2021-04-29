db.polyclinic.insertMany([
  { shift: 1, date: new Date('2021-04-21'), nurses: ['Egorova', 'Petrova', 'Sidorova'], department: 'Dep 1', wards: [1, 2, 5] },
  { shift: 2, date: new Date('2021-05-21'), nurses: ['Egorova', 'Smirnova'], department: 'Dep 2', wards: [4] },
  { shift: 1, date: new Date('2021-06-21'), nurses: ['Petrova', 'Sidorova'], department: 'Dep 3', wards: [1, 3] },
  { shift: 3, date: new Date('2021-07-21'), nurses: ['Smirnova', 'Petrova', 'Sidorova'], department: 'Dep 1', wards: [2, 4] },
  { shift: 1, date: new Date('2021-08-21'), nurses: ['Egorova', 'Petrova', 'Sidorova', 'Smirnova'], department: 'Dep 2', wards: [1, 2, 3, 4, 5] },
  { shift: 1, date: new Date('2021-09-21'), nurses: ['Smirnova'], department: 'Dep 1', wards: [5] },
]);
