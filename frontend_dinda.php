<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>GeoAR.js demo</title>
    <script src='https://aframe.io/releases/0.9.2/aframe.min.js'></script>
    <script src="https://raw.githack.com/jeromeetienne/AR.js/master/aframe/build/aframe-ar.min.js"></script>
    <script src="https://raw.githack.com/donmccurdy/aframe-extras/master/dist/aframe-extras.loaders.min.js"></script>
    <script>
        THREEx.ArToolkitContext.baseURL = 'https://raw.githack.com/jeromeetienne/ar.js/master/three.js/'
    </script>

    <script>
        // Workaround for an AR.js bug (https://github.com/jeromeetienne/AR.js/issues/410)
        const sceneEl = document.querySelector('a-scene');
        sceneEl.addEventListener('loaded', () => {
            sceneEl.camera = new THREE.PerspectiveCamera();
        });
    </script>
</head>


<body style='margin: 0; overflow: hidden;'>
    <!-- <a-marker-camera preset="hiro"> -->
    <?php include("./dbb/dev.php");?>

    <a-entity-camera>
        <a-scene vr-mode-ui="enabled: false" embedded arjs='sourceType: webcam; videoTexture: true; sourceWidth:1280; 
        sourceHeight:960; displayWidth: 1280; displayHeight: 960; debugUIEnabled: true;  arjs=' debugUIEnabled: false '> 

            <a-camera gps-camera rotation-reader arjs-device-orientation-controls='smoothingFactor: 0.1 ' gps-new-camera='gpsMinDistance: 5 '></a-camera>
            <?php
                if(is_array($fetchData)){      
                    foreach($fetchData as $data){
                        echo ("<a-entity gltf-model='./assets/magnemite/scene.gltf ' rotation='0 90 0 ' scale='0.5 0.5 0.5 '  look-at='[gps-camera] ' gps-entity-place='longitude: ".$data['longitude']."; latitude: ".$data['latitude']."; ' animation-mixer/>
                        
                        <a-text value=' ".$data['name']." Longitude: ".$data['longitude']." Latitude: ".$data['latitude']." ' scale='1.8 2 2 ' 
                        align='center '></a-text>
                        <a-text geometry='primitive:plane ' height=100 scale='6 2 2 ' align='center '></a-text>
                        ");
                    }
                }

            ?>  
            
        </a-scene>
    </a-entity-camera>
    
</body>

<a-scene embedded vr-mode-ui="enabled: false" arjs='debugUIEnabled: false; '>

    <a-plane position="0 0 0" rotation="-90 0 0" width="1" height="1" color="blue"></a-plane>

    <a-marker-camera preset="hiro"></a-marker-camera>
</a-scene>