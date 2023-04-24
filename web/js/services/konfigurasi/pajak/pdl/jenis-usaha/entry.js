data = {};
vars = {
  rekenings: [],
};
urls = {};
methods = {
  addRekening,
  removeRekening,
};
components = {};

function addRekening() {
  const newRekening = {
    id: this.rekenings.length + 1,
    rekening: "",
  };

  this.rekenings.push(newRekening);
}

function removeRekening(id) {
  this.rekenings.splice(id - 1, 1);
}
