const indexeddbName = `${window.location.origin}-sgv-store`;

var dbPromise = idb.open(indexeddbName, 1, function (db) {
    if (!db.objectStoreNames.contains('users')) {
        db.createObjectStore('users', { keyPath: 'id' });
    }

    if (!db.objectStoreNames.contains('items')) {
        db.createObjectStore('items', { keyPath: 'id' });
    }

    if (!db.objectStoreNames.contains('products')) {
        db.createObjectStore('products', { keyPath: 'id' });
    }

    if (!db.objectStoreNames.contains('receipts')) {
        db.createObjectStore('receipts', { keyPath: 'id', autoIncrement: true });
    }

});

function writeData(st, data) {
    return dbPromise
        .then(function (db) {
            var tx = db.transaction(st, 'readwrite');
            var store = tx.objectStore(st);
            store.add(data);
            return tx.complete;
        }).catch(err => { throw new Error() });
}


function readAllData(st) {
    return dbPromise
        .then(function (db) {
            var tx = db.transaction(st, 'readonly');
            var store = tx.objectStore(st);
            return store.getAll();
        })
}

function readDataById(st, id) {
    return dbPromise
        .then(function (db) {
            var tx = db.transaction(st, 'readonly');
            var store = tx.objectStore(st);
            return store.get(id);
        })
}

function removeDataById(st, id) {
    dbPromise
        .then(function (db) {
            var tx = db.transaction(st, 'readwrite');
            var store = tx.objectStore(st);
            store.delete(id);
            return tx.complete;
        }).catch(function (err) {
            console.log('Failed to remove', err);
        })
}

function removeAllData(st) {
    dbPromise
        .then(function (db) {
            var tx = db.transaction(st, 'readwrite');
            var store = tx.objectStore(st);
            store.clear();
            return tx.complete;
        })
}
