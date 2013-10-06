package org.hack4good.streemufi.model;

public class Artist {
    public String name;
    public String url;
    public String contact;
    public String text;


    public String toJSONString() {
        StringBuilder builder=new StringBuilder();
        builder.append("{ ");
        builder.append(getJSONKeyValuePair("name",name));
        builder.append(",");
        builder.append(getJSONKeyValuePair("video",url));
        builder.append(",");
        builder.append(getJSONKeyValuePair("contact",contact));
        builder.append(",");
        builder.append(getJSONKeyValuePair("location","foo"));
        builder.append(",");
        builder.append(getJSONKeyValuePair("text",text));
        builder.append("}");

        return builder.toString();
    }

    private String getJSONKeyValuePair(String key,String value) {
        return "\""+ key + "\"" + " : \"" + value +"\"";
    }

}
