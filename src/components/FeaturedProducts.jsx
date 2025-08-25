import React, { useEffect, useState } from "react";

export default function FeaturedProducts() {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    fetch("http://localhost:8080/api/products/featured")
      .then(res => res.json())
      .then(data => setProducts(data))
      .catch(err => console.error("Error fetching products:", err));
  }, []);

  return (
    <div className="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
      {products.map(product => (
        <div key={product.id} className="rounded-lg shadow p-4 bg-white">
          <img
            src={`http://localhost:8080/uploads/products/${product.image}`}
            alt={product.name}
            className="w-full h-48 object-cover rounded"
          />
          <h3 className="text-lg font-bold mt-2">{product.name}</h3>
          <p className="text-sm text-gray-600">{product.description}</p>
          <p className="font-semibold text-green-700">
            Rp {Number(product.price).toLocaleString()}
          </p>
          <a
            href={`https://wa.me/${product.contact}`}
            target="_blank"
            rel="noopener noreferrer"
            className="inline-block mt-2 bg-green-500 text-white px-4 py-2 rounded"
          >
            Hubungi WA
          </a>
        </div>
      ))}
    </div>
  );
}
