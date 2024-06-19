@extends('layouts.app')
@section('title', 'Buscador de clasificados')
@section('content')
   <x-jumbotron />          
   
   <div class="container mx-auto p-4" id="root">    
  </div>  
  
  <script type="text/babel">

  const loading = () => {
    Swal.fire({
      title: 'Cargando...',
      allowOutsideClick: false,
      showConfirmButton: false,
      willOpen: () => {
        Swal.showLoading();
      }
    });
  };

  const closeLoading = () => {
    Swal.close();
  };
  
  

    const CardComponent = ({ id ,title, short_description, image, phone, price }) => {
      return (
        <div className="max-w-sm rounded overflow-hidden shadow-lg bg-white">
          <img className="w-full h-48 object-cover" src={image} alt="Imagen del artículo" />
          <div className="px-6 py-4">
          <div className="font-bold text-xl mb-2">{title}</div>
          <p className="text-gray-700 text-base">
            {short_description}
          </p>
          <div className="mt-4">
            {
              price === '0' ? <span className="text-gray-900 font-bold text-lg"></span> : <span className="text-gray-900 font-bold text-lg"> {price}</span>
            }
          
          <p>            
            <a href={`https://wa.me/${phone}`} className="text-green-500 font-bold" target="_blank">{phone}</a>
            
          </p>
          
          </div>
        </div> 
          <div className="px-6 pt-4 pb-6">
            <a href={`/clasificado/ver/${id}`} className="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              ver más
            </a>
          </div>
        </div>
      );
    };

    const SearchComponent = ({categories, sectors, setClassifieds}) => {

      const [search, setSearch] = React.useState('');
      const [category, setCategory] = React.useState('');
      const [sector, setSector] = React.useState('');

      const onSearch = () => {
        const url =`/api/classifieds?search=${search}&category=${category}&sector=${sector}`;
        console.log(url);
        setClassifieds(url);          
      };

      const handleChange = (event) => {
        console.log(event.target.name, event.target.value);
        // search
        if (event.target.name === 'search') {
          setSearch(event.target.value);
        }
        // category
        if (event.target.name === 'category') {
          setCategory(event.target.value);
        }
        // sector
        if (event.target.name === 'sector') {
          setSector(event.target.value);
        }
      };


      
      return (
        <div className="container mx-auto p-4">    
          <h2 className="text-2xl font-bold">Buscar</h2>
          <div className="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">  

          <div className="mb-4">
              <input type="text" name="search" className="w-full p-2 border border-gray-300 rounded"  placeholder="Buscar por nombre..." onChange={handleChange} />
          </div> 
          
          <div className="mb-4">

            <select name="category" className="w-full p-2 border border-gray-300 rounded" onChange={handleChange}>
              <option value="">Seleccionar categoría</option>
              {
                categories && categories.map(category => (
                  <option key={category.id} value={category.id}>{category.name}</option>
                ))
              }
            </select>

            </div>

            <div className="mb-4">

            <select name="sector" className="w-full p-2 border border-gray-300 rounded" onChange={handleChange}>
              <option value="">Seleccionar sector</option>
              {
                sectors && sectors.map(sector => (
                  <option key={sector.id} value={sector.id}>{sector.name}</option>
                ))
              }

             
            </select>

          </div>

          <div className="mb-4">
            <button className="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onClick={onSearch}>
              Buscar
            </button>
            </div>
              
         </div>
        </div>
          
          
      );
    };

     // Definir PropTypes para el componente Saludo
     SearchComponent.propTypes = {
      categories: PropTypes.array.isRequired,
      sectors: PropTypes.array.isRequired,
      setClassifieds: PropTypes.func.isRequired
    };



    const App = () => {
      const [classifieds, setClassifieds] = React.useState([]);
      const [categories, setCategories] = React.useState([]);
      const [sectors, setSectors] = React.useState([]);      
    

      const getSectors = () => {
        fetch('/api/sectors')
          .then(response => response.json())
          .then(data => setSectors(data));
      };

      const getCategories = () => {
        fetch('/api/categories')
          .then(response => response.json())
          .then(data => setCategories(data));
      };      
   

      React.useEffect(() => {
        fetch('/api/classifieds')
          .then(response => response.json())
          .then(data => setClassifieds(data));

        getCategories();
        getSectors();
      }, []);

      const onSearch = (url) => {
        loading();
        fetch(url)
          .then(response => response.json())
          .then(data => {
            setClassifieds(data);
            closeLoading();
          });
            
        
      };

    return (
      <>
      <SearchComponent sectors={sectors} categories={categories} setClassifieds={onSearch} />
      <div className="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      {classifieds.length === 0 && <p>Cargando...</p>}
      {classifieds.map(classified => (
        <CardComponent
        id={classified.id}
          key={classified.id}
          title={classified.title}
          short_description={classified.short_description}
          image={classified.image}
          phone={classified.phone}
          price={classified.price}
        />
      ))}
      </div>
      </>
    );
   
   
   
   
   
   
    };
  
    ReactDOM.createRoot(document.getElementById('root')).render(<App />);
  </script>
  </script>
@endsection   

